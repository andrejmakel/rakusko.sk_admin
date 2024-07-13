<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyNaviRequest;
use App\Http\Requests\StoreNaviRequest;
use App\Http\Requests\UpdateNaviRequest;
use App\Models\Navi;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class NaviController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('navi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $navis = Navi::all();

        return view('admin.navis.index', compact('navis'));
    }

    public function create()
    {
        abort_if(Gate::denies('navi_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.navis.create');
    }

    public function store(StoreNaviRequest $request)
    {
        $navi = Navi::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $navi->id]);
        }

        return redirect()->route('admin.navis.index');
    }

    public function edit(Navi $navi)
    {
        abort_if(Gate::denies('navi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.navis.edit', compact('navi'));
    }

    public function update(UpdateNaviRequest $request, Navi $navi)
    {
        $navi->update($request->all());

        return redirect()->route('admin.navis.index');
    }

    public function show(Navi $navi)
    {
        abort_if(Gate::denies('navi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.navis.show', compact('navi'));
    }

    public function destroy(Navi $navi)
    {
        abort_if(Gate::denies('navi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $navi->delete();

        return back();
    }

    public function massDestroy(MassDestroyNaviRequest $request)
    {
        $navis = Navi::find(request('ids'));

        foreach ($navis as $navi) {
            $navi->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('navi_create') && Gate::denies('navi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Navi();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
