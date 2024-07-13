<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyTransPlaceRequest;
use App\Http\Requests\StoreTransPlaceRequest;
use App\Http\Requests\UpdateTransPlaceRequest;
use App\Models\Lang;
use App\Models\Place;
use App\Models\TransPlace;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class TransPlaceController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('trans_place_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transPlaces = TransPlace::with(['lang', 'origin'])->get();

        return view('admin.transPlaces.index', compact('transPlaces'));
    }

    public function create()
    {
        abort_if(Gate::denies('trans_place_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $langs = Lang::pluck('lang', 'id')->prepend(trans('global.pleaseSelect'), '');

        $origins = Place::pluck('id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.transPlaces.create', compact('langs', 'origins'));
    }

    public function store(StoreTransPlaceRequest $request)
    {
        
        
        if($request->transData){
            foreach($request->transData as $data){
                $updatedData = [];
                    foreach ($data as $key => $value) {
                        $newKey = trim($key, "'");
                        $updatedData[$newKey] = $value;}   
                $updatedData = ['_token' => $request->_token] + $updatedData;        
                TransPlace::create($updatedData);
            }
        }else{
            $transPlace = TransPlace::create($request->all());
        }


        return redirect()->route('admin.trans-places.index');
    }

    public function edit(TransPlace $transPlace)
    {
        
        abort_if(Gate::denies('trans_place_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $langs = Lang::pluck('lang', 'id')->prepend(trans('global.pleaseSelect'), '');

        $origins = Place::pluck('id')->prepend(trans('global.pleaseSelect'), '');

        $transPlace->load('lang', 'origin');

        //dd($origins);

        return view('admin.transPlaces.edit', compact('langs', 'origins', 'transPlace'));
    }



    public function update(UpdateTransPlaceRequest $request, TransPlace $transPlace)
    {
        $transPlace->update($request->all());

        return redirect()->route('admin.trans-places.index');
    }

    public function clone($id)
    {
        
        $transPlace = TransPlace::where('id', $id)
                        ->firstOrFail();
        

        abort_if(Gate::denies('trans_place_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $langs = Lang::pluck('lang', 'id')->prepend(trans('global.pleaseSelect'), '');

        $origins = Place::pluck('id')->prepend(trans('global.pleaseSelect'), '');

        $transPlace->load('lang', 'origin');

        return view('admin.transPlaces.clone', compact('langs', 'origins', 'transPlace'));
    }

    public function show(TransPlace $transPlace)
    {
        abort_if(Gate::denies('trans_place_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transPlace->load('lang', 'origin');

        $clone = TransPlace::create($transPlace->toArray());

        return view('admin.transPlaces.show', compact('transPlace'));
    }

    public function colne(TransPlace $transPlace)
    {
        abort_if(Gate::denies('trans_place_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transPlace->load('lang', 'origin');
    }

    public function destroy(TransPlace $transPlace)
    {
        abort_if(Gate::denies('trans_place_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transPlace->delete();

        return back();
    }

    public function massDestroy(MassDestroyTransPlaceRequest $request)
    {
        $transPlaces = TransPlace::find(request('ids'));

        foreach ($transPlaces as $transPlace) {
            $transPlace->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('trans_place_create') && Gate::denies('trans_place_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new TransPlace();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
