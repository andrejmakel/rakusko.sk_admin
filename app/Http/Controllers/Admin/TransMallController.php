<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyTransMallRequest;
use App\Http\Requests\StoreTransMallRequest;
use App\Http\Requests\UpdateTransMallRequest;
use App\Models\Lang;
use App\Models\Mall;
use App\Models\TransMall;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class TransMallController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('trans_mall_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transMalls = TransMall::with(['lang', 'origin'])->get();

        return view('admin.transMalls.index', compact('transMalls'));
    }

    public function create()
    {
        abort_if(Gate::denies('trans_mall_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $langs = Lang::pluck('lang', 'id')->prepend(trans('global.pleaseSelect'), '');

        $origins = Mall::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.transMalls.create', compact('langs', 'origins'));
    }

    public function store(StoreTransMallRequest $request)
    {
        $transMall = TransMall::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $transMall->id]);
        }

        return redirect()->route('admin.trans-malls.index');
    }

    public function edit(TransMall $transMall)
    {
        abort_if(Gate::denies('trans_mall_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $langs = Lang::pluck('lang', 'id')->prepend(trans('global.pleaseSelect'), '');

        $origins = Mall::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $transMall->load('lang', 'origin');

        return view('admin.transMalls.edit', compact('langs', 'origins', 'transMall'));
    }

    public function update(UpdateTransMallRequest $request, TransMall $transMall)
    {
        $transMall->update($request->all());

        return redirect()->route('admin.trans-malls.index');
    }

    public function show(TransMall $transMall)
    {
        abort_if(Gate::denies('trans_mall_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transMall->load('lang', 'origin');

        return view('admin.transMalls.show', compact('transMall'));
    }

    public function destroy(TransMall $transMall)
    {
        abort_if(Gate::denies('trans_mall_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transMall->delete();

        return back();
    }

    public function massDestroy(MassDestroyTransMallRequest $request)
    {
        $transMalls = TransMall::find(request('ids'));

        foreach ($transMalls as $transMall) {
            $transMall->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('trans_mall_create') && Gate::denies('trans_mall_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new TransMall();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
