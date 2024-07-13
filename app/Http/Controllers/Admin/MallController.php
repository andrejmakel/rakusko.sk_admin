<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyMallRequest;
use App\Http\Requests\StoreMallRequest;
use App\Http\Requests\UpdateMallRequest;
use App\Models\Mall;
use App\Models\TransMall;
use App\Models\Lang;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class MallController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('mall_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $malls = Mall::with(['media'])->get();

        return view('admin.malls.index', compact('malls'));
    }

    public function create()
    {
        abort_if(Gate::denies('mall_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $langs = Lang::all();

        return view('admin.malls.create', compact('langs'));
    }

    public function store(StoreMallRequest $request)
    {
        $mall = Mall::create($request->all());
        foreach ($request->input('cover_img', []) as $file) {
            $mall->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('cover_img');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $mall->id]);
        }

        //Ukladanie prekladov
        
        foreach($request->transData as $data){
            $updatedData = [];
                foreach ($data as $key => $value) {
                    $newKey = trim($key, "'");
                    $updatedData[$newKey] = $value;
                }   
            $updatedData = ['origin_id' => $mall->id] + $updatedData;  
            $updatedData = ['_token' => $request->_token] + $updatedData; 
            
                
            TransMall::create($updatedData);
        }

        return redirect()->route('admin.malls.index');
    }

    public function edit(Mall $mall)
    {
        abort_if(Gate::denies('mall_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $langs = Lang::all();

        if(count($langs) > count($mall->originTransMalls)){
            $langsID = $langs->pluck('id')->toArray();
            $transMallLangsID = $mall->originTransMalls->pluck('lang_id')->toArray();
            $missingID = array_diff($langsID, $transMallLangsID);
            foreach($missingID as $id){
                $transMall = new TransMall;
                $transMall->lang_id = $id;
                $transMall->origin_id = $mall->id;
                $transMall->save();
            }
            
        }
    
        return view('admin.malls.edit', compact('mall', 'langs'));
    }

    public function clone($id)
    {
        //duplikácia miesta
        $mall = Mall::where("id", $id)->firstOrFail();
        $clone = $mall->replicate();
        

        //úprava slugu
        $baseSlug = $mall->slug;
        $i = 1;
        while (Mall::where('slug', $clone->slug)->exists()) {
            $clone->slug = $baseSlug . '-copy-' . $i;
            $i++;
        } 
        //uloženie clonu
        $clone->push();

        //duplikácia médií
        foreach ($mall->media as $media){
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

        return redirect("admin/malls/".$clone->id."/edit");
    }

    public function update(UpdateMallRequest $request, Mall $mall)
    {
        $mall->update($request->all());
        if (count($mall->cover_img) > 0) {
            foreach ($mall->cover_img as $media) {
                if (! in_array($media->file_name, $request->input('cover_img', []))) {
                    $media->delete();
                }
            }
        }
        $media = $mall->cover_img->pluck('file_name')->toArray();
        foreach ($request->input('cover_img', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $mall->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('cover_img');
            }
        }

        //Vymazanie a znovuvytvorenie prekladov


        foreach($mall->originTransMalls as $transMall){
            $transMall->delete();
        }
       
        foreach($request->transData as $data){
            $updatedData = [];
                foreach ($data as $key => $value) {
                    $newKey = trim($key, "'");
                    $updatedData[$newKey] = $value;
                }   
            $updatedData = ['origin_id' => $mall->id] + $updatedData;  
            $updatedData = ['_token' => $request->_token] + $updatedData; 
            
            
            TransMall::create($updatedData);
        }

       

        return redirect()->route('admin.malls.edit', $mall->id);
    }

    public function show(Mall $mall)
    {
        abort_if(Gate::denies('mall_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mall->load('mallShops', 'originTransMalls');

        return view('admin.malls.show', compact('mall'));
    }

    public function destroy(Mall $mall)
    {
        abort_if(Gate::denies('mall_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mall->delete();

        return back();
    }

    public function massDestroy(MassDestroyMallRequest $request)
    {
        $malls = Mall::find(request('ids'));

        foreach ($malls as $mall) {
            $mall->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('mall_create') && Gate::denies('mall_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Mall();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
