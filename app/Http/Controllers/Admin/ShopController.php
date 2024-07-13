<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyShopRequest;
use App\Http\Requests\StoreShopRequest;
use App\Http\Requests\UpdateShopRequest;
use App\Models\Mall;
use App\Models\Opening;
use App\Models\OpeningText;
use App\Models\Shop;
use App\Models\ShopCategory;
use App\Models\Lang;
use App\Models\TransShop;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ShopController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('shop_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shops = Shop::with(['categories','openings', 'mall', 'media'])->get();

        return view('admin.shops.index', compact('shops'));
    }

    public function create()
    {
        abort_if(Gate::denies('shop_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = ShopCategory::pluck('title_sk', 'id');

        $openings = Opening::pluck('open_hours', 'id');

        $malls = Mall::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $open_texts = OpeningText::pluck('sk', 'id')->prepend(trans('global.pleaseSelect'), '');

        $langs = Lang::all();

        return view('admin.shops.create', compact('categories', 'malls', 'openings', 'open_texts', 'langs'));
    }

    public function store(StoreShopRequest $request)
    {


/*          if (is_numeric($request->category_id) == false){
            $category = new ShopCategory;
            $category->title_sk = $request->category_id;
            $requestData=$request->all();
            $category->save();
            $requestData["category_id"]=$category->id;
        }else{
            $requestData=$request->all();
        } */

        $requestData=$request->all();

        $shop = Shop::create($requestData);

        $shop->categories()->sync($request->input('categories', []));
 
        if ($request->input('logo', false)) {
            $shop->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
        }

        foreach ($request->input('gallery', []) as $file) {
            $shop->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('gallery');
        }

        if ($request->input('map_img', false)) {
            $shop->addMedia(storage_path('tmp/uploads/' . basename($request->input('map_img'))))->toMediaCollection('map_img');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $shop->id]);
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
     
        $shop->openings()->sync($openDataId);


        //Ukladanie prekladov

        foreach($request->transData as $data){
            $updatedData = [];
                foreach ($data as $key => $value) {
                    $newKey = trim($key, "'");
                    $updatedData[$newKey] = $value;
                }   
            $updatedData = ['origin_id' => $shop->id] + $updatedData;  
            $updatedData = ['_token' => $request->_token] + $updatedData; 
            
                
            TransShop::create($updatedData);
        }


        return redirect()->route('admin.shops.index');
    }

    public function edit(Shop $shop)
    {
        abort_if(Gate::denies('shop_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = ShopCategory::pluck('title_sk', 'id');

        $openings = Opening::pluck('open_hours', 'id');

        $malls = Mall::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $shop->load('openings', 'mall');

        $open_texts = OpeningText::pluck('sk', 'id')->prepend(trans('global.pleaseSelect'), '');

        $langs = Lang::all();

        if(count($langs) > count($shop->originTransShops)){
            $langsID = $langs->pluck('id')->toArray();
            $transShopLangsID = $shop->originTransShops->pluck('lang_id')->toArray();
            $missingID = array_diff($langsID, $transShopLangsID);
            foreach($missingID as $id){
                $transShop = new TransShop;
                $transShop->lang_id = $id;
                $transShop->origin_id = $shop->id;
                $transShop->save();
            }
            
        }

        return view('admin.shops.edit', compact('categories', 'malls', 'openings', 'shop', 'open_texts', 'langs'));
    }

    public function clone($id)
    {
        //duplikácia miesta
        $shop = Shop::where("id", $id)->firstOrFail();
        $clone = $shop->replicate();
        

        //úprava slugu
        $baseSlug = $shop->slug;
        $i = 1;
        while (Shop::where('slug', $clone->slug)->exists()) {
            $clone->slug = $baseSlug . '-copy-' . $i;
            $i++;
        } 
        //uloženie clonu
        $clone->push();

        //dorobenie relationships
        foreach ($shop->openings as $opening) {
            $clone->openings()->save($opening->replicate());
        }
        
        //duplikácia médií
        foreach ($shop->media as $media){
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

        return redirect("admin/shops/".$clone->id."/edit");
    }

    public function update(UpdateShopRequest $request, Shop $shop)
    {

/*         if (is_numeric($request->category_id) == false){
            $category = new ShopCategory;
            $category->title_sk = $request->category_id;
            $requestData=$request->all();
            $category->save();
            $requestData["category_id"]=$category->id;
        }else{
            $requestData=$request->all();
        } */

        $requestData=$request->all();
        $shop->update($requestData);
        $shop->categories()->sync($request->input('categories', []));
        if ($request->input('logo', false)) {
            if (! $shop->logo || $request->input('logo') !== $shop->logo->file_name) {
                if ($shop->logo) {
                    $shop->logo->delete();
                }
                $shop->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
            }
        } elseif ($shop->logo) {
            $shop->logo->delete();
        }

        if (count($shop->gallery) > 0) {
            foreach ($shop->gallery as $media) {
                if (! in_array($media->file_name, $request->input('gallery', []))) {
                    $media->delete();
                }
            }
        }
        $media = $shop->gallery->pluck('file_name')->toArray();
        foreach ($request->input('gallery', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $shop->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('gallery');
            }
        }

        if ($request->input('map_img', false)) {
            if (! $shop->map_img || $request->input('map_img') !== $shop->map_img->file_name) {
                if ($shop->map_img) {
                    $shop->map_img->delete();
                }
                $shop->addMedia(storage_path('tmp/uploads/' . basename($request->input('map_img'))))->toMediaCollection('map_img');
            }
        } elseif ($shop->map_img) {
            $shop->map_img->delete();
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
        
        if($shop->openings != null){
            foreach ($shop->openings as $openings){
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
       $shop->openings()->sync($openDataId);

       //Vymazanie a znovuvytvorenie prekladov


       foreach($shop->originTransShops as $transShop){
        $transShop->delete();
    }
    
    foreach($request->transData as $data){
        $updatedData = [];
            foreach ($data as $key => $value) {
                $newKey = trim($key, "'");
                $updatedData[$newKey] = $value;
            }   
        $updatedData = ['origin_id' => $shop->id] + $updatedData;  
        $updatedData = ['_token' => $request->_token] + $updatedData; 
        
            
        TransShop::create($updatedData);
    }

        return redirect()->route('admin.shops.edit', $shop->id);
    }

    public function show(Shop $shop)
    {
        abort_if(Gate::denies('shop_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shop->load('categories', 'openings', 'mall', 'originTransShops');

        return view('admin.shops.show', compact('shop'));
    }

    public function destroy(Shop $shop)
    {
        abort_if(Gate::denies('shop_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shop->delete();

        return back();
    }

    public function massDestroy(MassDestroyShopRequest $request)
    {
        $shops = Shop::find(request('ids'));

        foreach ($shops as $shop) {
            $shop->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('shop_create') && Gate::denies('shop_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Shop();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
