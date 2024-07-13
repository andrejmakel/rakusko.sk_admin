<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyInfoRequest;
use App\Http\Requests\StoreInfoRequest;
use App\Http\Requests\UpdateInfoRequest;
use App\Models\Info;
use App\Models\Tag;
use App\Models\Lang;
use App\Models\TransInfo;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class InfoController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('info_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $infos = Info::with(['tags', 'media'])->get();

        return view('admin.infos.index', compact('infos'));
    }

    public function create()
    {
        abort_if(Gate::denies('info_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tags = Tag::pluck('title_sk', 'id');

        $langs = Lang::all();

        return view('admin.infos.create', compact('tags', 'langs'));
    }

    public function store(StoreInfoRequest $request)
    {
        $info = Info::create($request->all());
        
        $info->tags()->sync($request->input('tags', []));
        foreach ($request->input('cover_img', []) as $file) {
            $info->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('cover_img');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $info->id]);
        }

         //Ukladanie prekladov

         foreach($request->transData as $data){
            $updatedData = [];
                foreach ($data as $key => $value) {
                    $newKey = trim($key, "'");
                    $updatedData[$newKey] = $value;
                }   
            $updatedData = ['origin_id' => $info->id] + $updatedData;  
            $updatedData = ['_token' => $request->_token] + $updatedData; 
            
                
            TransInfo::create($updatedData);
        }
        
        return redirect()->route('admin.infos.index');
    }

    public function edit(Info $info)
    {
        abort_if(Gate::denies('info_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tags = Tag::pluck('title_sk', 'id');

        $info->load('tags');

        $langs = Lang::all();

        if(count($langs) > count($info->originTransInfos)){
            $langsID = $langs->pluck('id')->toArray();
            $transInfoLangsID = $info->originTransInfos->pluck('lang_id')->toArray();
            $missingID = array_diff($langsID, $transInfoLangsID);
            foreach($missingID as $id){
                $transInfo = new TransInfo;
                $transInfo->lang_id = $id;
                $transInfo->origin_id = $info->id;
                $transInfo->save();
            }
            
        }

        return view('admin.infos.edit', compact('info', 'tags', 'langs'));
    }

    public function clone($id)
    {
        //duplikácia miesta
        $info = Info::where("id", $id)->firstOrFail();
        $clone = $info->replicate();
        

        //úprava slugu
        $baseSlug = $info->slug;
        $i = 1;
        while (Info::where('slug', $clone->slug)->exists()) {
            $clone->slug = $baseSlug . '-copy-' . $i;
            $i++;
        } 
        //uloženie clonu
        $clone->push();

        //dorobenie relationships
        $clone->tags()->saveMany($info->tags);


        //duplikácia médií
        foreach ($info->media as $media){
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

        return redirect("admin/infos/".$clone->id."/edit");
    }

    public function update(UpdateInfoRequest $request, Info $info)
    {
        $info->update($request->all());
        $info->tags()->sync($request->input('tags', []));
        if (count($info->cover_img) > 0) {
            foreach ($info->cover_img as $media) {
                if (! in_array($media->file_name, $request->input('cover_img', []))) {
                    $media->delete();
                }
            }
        }
        $media = $info->cover_img->pluck('file_name')->toArray();
        foreach ($request->input('cover_img', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $info->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('cover_img');
            }
        }

        //Vymazanie a znovuvytvorenie prekladov


        foreach($info->originTransInfos as $transInfo){
            $transInfo->delete();
        }
        
        foreach($request->transData as $data){
            $updatedData = [];
                foreach ($data as $key => $value) {
                    $newKey = trim($key, "'");
                    $updatedData[$newKey] = $value;
                }   
            $updatedData = ['origin_id' => $info->id] + $updatedData;  
            $updatedData = ['_token' => $request->_token] + $updatedData; 
            
                
            TransInfo::create($updatedData);
        }
         

        return redirect()->route('admin.infos.edit', $info->id);
    }

    public function show(Info $info)
    {
        abort_if(Gate::denies('info_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $info->load('tags', 'originTransInfos');

        return view('admin.infos.show', compact('info'));
    }

    public function destroy(Info $info)
    {
        abort_if(Gate::denies('info_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $info->delete();

        return back();
    }

    public function massDestroy(MassDestroyInfoRequest $request)
    {
        $infos = Info::find(request('ids'));

        foreach ($infos as $info) {
            $info->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('info_create') && Gate::denies('info_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Info();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
