<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPlaceRequest;
use App\Http\Requests\StorePlaceRequest;
use App\Http\Requests\UpdatePlaceRequest;
use App\Models\Opening;
use App\Models\OpeningText;
use App\Models\Place;
use App\Models\Price;
use App\Models\PriceText;
use App\Models\Tag;
use App\Models\Lang;
use App\Models\TransPlace;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class PlaceController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('place_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $places = Place::with(['openings', 'prices', 'tags', 'media'])->get();


        return view('admin.places.index', compact('places'));
    }

    public function create()
    {
        abort_if(Gate::denies('place_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $openings = Opening::pluck('open_hours', 'id');

        $prices = Price::pluck('price', 'id');

        $tags = Tag::pluck('title_sk', 'id');

        $open_texts = OpeningText::pluck('sk', 'id')->prepend(trans('global.pleaseSelect'), '');

        $price_texts = PriceText::pluck('sk', 'id')->prepend(trans('global.pleaseSelect'), '');

        $langs = Lang::all();

        return view('admin.places.create', compact('openings', 'prices', 'tags', 'open_texts', 'price_texts', 'langs'));
    }

    public function store(StorePlaceRequest $request)
    {
    
        // Create record in places table
        $place = Place::create($request->all());
        

        // Tags and media
        $place->tags()->sync($request->input('tags', []));
        foreach ($request->input('cover_img', []) as $file) {
            $place->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('cover_img');
        }



        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $place->id]);
        }

        /* OpeningHours */

        $openData = $request->input('open_data');
      
        $openDataId = [];
        

        /* Ukladanie novo vytvorených open textov a zmena v openData z openTextu na jeho nové ID */

        if($openData != null){
            foreach($openData as $index => $data){
                if (is_numeric($data["text"]) == false){
                    $openText = new OpeningText;
                    $openText->sk = $data["text"];
                    $openText->save();
                    $openData[$index]["text"]=$openText->id;
                
                }
            } 
        }
        
        
        if($openData != null){
            foreach($openData as $data){
                $opening = new Opening;
                $opening->open_hours = $data['hours'];
                $opening->open_text_id = $data['text'];
                $opening->save();
                array_push($openDataId, $opening->id);
            } 
        }
    
       $place->openings()->sync($openDataId);



        /* Price */

        $priceData = $request->input('price_data');
        $priceDataId = [];

        /* Ukladanie novo vytvorených price textov a zmena v priceData z priceTextu na jeho nové ID */

        if($priceData != null){
            foreach($priceData as $index => $data){
                if (is_numeric($data["text"]) == false){
                    $priceText = new PriceText;
                    $priceText->sk = $data["text"];
                    $priceText->save();
                    $priceData[$index]["text"]=$priceText->id;
                
                }
            } 
        }
        
        if($priceData != null){   
        foreach($priceData as $data){
            $price = new Price;
            $price->price = $data['price'];
            $price->price_text_id = $data['text'];
            $price->save();
            array_push($priceDataId, $price->id);
            } 
        }
          
        $place->prices()->sync($priceDataId);


        //Ukladanie prekladov

        foreach($request->transData as $data){
            $updatedData = [];
                foreach ($data as $key => $value) {
                    $newKey = trim($key, "'");
                    $updatedData[$newKey] = $value;
                }   
            $updatedData = ['origin_id' => $place->id] + $updatedData;  
            $updatedData = ['_token' => $request->_token] + $updatedData; 
            
                
            TransPlace::create($updatedData);
        }

        
        return redirect()->route('admin.places.index');
    }

    public function edit(Place $place)
    {
        abort_if(Gate::denies('place_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $openings = Opening::pluck('open_hours', 'id');

        $prices = Price::pluck('price', 'id');

        $tags = Tag::pluck('title_sk', 'id');

        $place->load('openings', 'prices', 'tags');

        $open_texts = OpeningText::pluck('sk', 'id')->prepend(trans('global.pleaseSelect'), '');

        $price_texts = PriceText::pluck('sk', 'id')->prepend(trans('global.pleaseSelect'), '');

        $langs = Lang::all();

        if(count($langs) > count($place->originTransPlaces)){
            $langsID = $langs->pluck('id')->toArray();
            $transPlaceLangsID = $place->originTransPlaces->pluck('lang_id')->toArray();
            $missingID = array_diff($langsID, $transPlaceLangsID);
            foreach($missingID as $id){
                $transPlace = new TransPlace;
                $transPlace->lang_id = $id;
                $transPlace->origin_id = $place->id;
                $transPlace->save();
            }
            
        }

        return view('admin.places.edit', compact('openings', 'place', 'prices', 'tags', 'open_texts', 'price_texts', 'langs'));
    }

    public function clone($id)
    {
        //duplikácia miesta
        $place = Place::where("id", $id)->firstOrFail();
        $clone = $place->replicate();
        

        //úprava slugu
        $baseSlug = $place->slug;
        $i = 1;
        while (Place::where('slug', $clone->slug)->exists()) {
            $clone->slug = $baseSlug . '-copy-' . $i;
            $i++;
        } 
        //uloženie clonu
        $clone->push();

        //dorobenie relationships
        foreach ($place->openings as $opening) {
            $clone->openings()->save($opening->replicate());
        }
        foreach ($place->prices as $price) {
            $clone->prices()->save($price->replicate());
        }

        $clone->tags()->saveMany($place->tags);


        //duplikácia médií
        foreach ($place->media as $media){
            $newMedia = $media->replicate();
            $newMedia->uuid = null;
            $newMedia->model_id = $clone->id;
            $filePath = $media->getPath();
            $clone->addMedia($filePath)
                ->preservingOriginal()
                ->usingName($media->name)
                ->usingFileName($media->file_name)
                ->toMediaCollection($media->collection_name);
        }

        return redirect("admin/places/".$clone->id."/edit");
    }

    public function update(UpdatePlaceRequest $request, Place $place)
    {
        $place->update($request->all());
    
        $place->tags()->sync($request->input('tags', []));
        

        if (count($place->cover_img) > 0) {
            foreach ($place->cover_img as $media) {
                if (! in_array($media->file_name, $request->input('cover_img', []))) {
                    $media->delete();
                }
            }
        }
        $media = $place->cover_img->pluck('file_name')->toArray();
        foreach ($request->input('cover_img', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $place->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('cover_img');
            }
        }

       

        /* OpeningHours */
        $openData = $request->input('open_data');

        /* Ukladanie novo vytvorených open textov a zmena v openData z openTextu na jeho nové ID */

        if($openData != null){
            foreach($openData as $index => $data){
                if (is_numeric($data["text"]) == false){
                    $openText = new OpeningText;
                    $openText->sk = $data["text"];
                    $openText->save();
                    $openData[$index]["text"]=$openText->id;
                
                }
            } 
        }

        if($place->openings != null){
            foreach ($place->openings as $openings){
                $openings->delete();
            }
        }
        $openDataId = [];
        
        if($openData != null){
            foreach($openData as $data){
                $opening = new Opening;
                $opening->open_hours = $data['hours'];
                $opening->open_text_id = $data['text'];
                $opening->save();
                array_push($openDataId, $opening->id);
            } 
        }
       $place->openings()->sync($openDataId);


        /* Price */

        $priceData = $request->input('price_data');

        /* Ukladanie novo vytvorených price textov a zmena v priceData z priceTextu na jeho nové ID */

        if($priceData != null){
        foreach($priceData as $index => $data){
            if (is_numeric($data["text"]) == false){
                $priceText = new PriceText;
                $priceText->sk = $data["text"];
                $priceText->save();
                $priceData[$index]["text"]=$priceText->id;
            
            }
        } 
    }


        if($place->prices != null){
            foreach ($place->prices as $price){
                $price->delete();
            }
        }
        $priceDataId = [];
        
        if($priceData != null){   
        foreach($priceData as $data){
            $price = new Price;
            $price->price = $data['price'];
            $price->price_text_id = $data['text'];
            $price->save();
            array_push($priceDataId, $price->id);
            } 
        }
            
        $place->prices()->sync($priceDataId);



        //Vymazanie a znovuvytvorenie prekladov


        foreach($place->originTransPlaces as $transPlace){
            $transPlace->delete();
        }
        
        foreach($request->transData as $data){
            $updatedData = [];
                foreach ($data as $key => $value) {
                    $newKey = trim($key, "'");
                    $updatedData[$newKey] = $value;
                }   
            $updatedData = ['origin_id' => $place->id] + $updatedData;  
            $updatedData = ['_token' => $request->_token] + $updatedData; 
            
                
            TransPlace::create($updatedData);
        }
        
        
        return redirect()->route('admin.places.edit', $place->id);
    }


    public function show(Place $place)
    {
        abort_if(Gate::denies('place_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $place->load('openings', 'prices', 'tags', 'originTransPlaces');

        return view('admin.places.show', compact('place'));
    }

    public function destroy(Place $place)
    {
        abort_if(Gate::denies('place_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

       

        $place->delete();

        return back();
    }

    public function massDestroy(MassDestroyPlaceRequest $request)
    {
        $places = Place::find(request('ids'));

        foreach ($places as $place) {
            $place->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('place_create') && Gate::denies('place_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Place();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
