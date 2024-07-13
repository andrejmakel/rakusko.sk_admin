<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyTransInfoRequest;
use App\Http\Requests\StoreTransInfoRequest;
use App\Http\Requests\UpdateTransInfoRequest;
use App\Models\Info;
use App\Models\Lang;
use App\Models\TransInfo;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class TransInfoController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('trans_info_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transInfos = TransInfo::with(['lang', 'origin'])->get();

        return view('admin.transInfos.index', compact('transInfos'));
    }

    public function create()
    {
        abort_if(Gate::denies('trans_info_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $langs = Lang::pluck('lang', 'id')->prepend(trans('global.pleaseSelect'), '');

        $origins = Info::pluck('id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.transInfos.create', compact('langs', 'origins'));
    }

    public function store(StoreTransInfoRequest $request)
    {
        $transInfo = TransInfo::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $transInfo->id]);
        }

        return redirect()->route('admin.trans-infos.index');
    }

    public function edit(TransInfo $transInfo)
    {
        abort_if(Gate::denies('trans_info_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $langs = Lang::pluck('lang', 'id')->prepend(trans('global.pleaseSelect'), '');

        $origins = Info::pluck('id')->prepend(trans('global.pleaseSelect'), '');

        $transInfo->load('lang', 'origin');

        return view('admin.transInfos.edit', compact('langs', 'origins', 'transInfo'));
    }

    public function update(UpdateTransInfoRequest $request, TransInfo $transInfo)
    {
        $transInfo->update($request->all());

        return redirect()->route('admin.trans-infos.index');
    }

    public function show(TransInfo $transInfo)
    {
        abort_if(Gate::denies('trans_info_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transInfo->load('lang', 'origin');

        return view('admin.transInfos.show', compact('transInfo'));
    }

    public function destroy(TransInfo $transInfo)
    {
        abort_if(Gate::denies('trans_info_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transInfo->delete();

        return back();
    }

    public function massDestroy(MassDestroyTransInfoRequest $request)
    {
        $transInfos = TransInfo::find(request('ids'));

        foreach ($transInfos as $transInfo) {
            $transInfo->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('trans_info_create') && Gate::denies('trans_info_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new TransInfo();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
