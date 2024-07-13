<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroySidebarRequest;
use App\Http\Requests\StoreSidebarRequest;
use App\Http\Requests\UpdateSidebarRequest;
use App\Models\Lang;
use App\Models\Sidebar;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class SidebarController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('sidebar_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sidebars = Sidebar::with(['lang', 'media'])->get();

        $langs = Lang::all();

        return view('admin.sidebars.index', compact('sidebars', 'langs'));
    }

    public function create()
    {
        abort_if(Gate::denies('sidebar_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $langs = Lang::pluck('lang', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.sidebars.create', compact('langs'));
    }

    public function store(StoreSidebarRequest $request)
    {
        $sidebar = Sidebar::create($request->all());

        if ($request->input('cover_img', false)) {
            $sidebar->addMedia(storage_path('tmp/uploads/' . basename($request->input('cover_img'))))->toMediaCollection('cover_img');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $sidebar->id]);
        }

        return redirect()->route('admin.sidebars.index');
    }

    public function edit(Sidebar $sidebar)
    {
        abort_if(Gate::denies('sidebar_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $langs = Lang::pluck('lang', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sidebar->load('lang');

        return view('admin.sidebars.edit', compact('langs', 'sidebar'));
    }

    public function update(UpdateSidebarRequest $request, Sidebar $sidebar)
    {
        $sidebar->update($request->all());

        if ($request->input('cover_img', false)) {
            if (! $sidebar->cover_img || $request->input('cover_img') !== $sidebar->cover_img->file_name) {
                if ($sidebar->cover_img) {
                    $sidebar->cover_img->delete();
                }
                $sidebar->addMedia(storage_path('tmp/uploads/' . basename($request->input('cover_img'))))->toMediaCollection('cover_img');
            }
        } elseif ($sidebar->cover_img) {
            $sidebar->cover_img->delete();
        }

        return redirect()->route('admin.sidebars.index');
    }

    public function show(Sidebar $sidebar)
    {
        abort_if(Gate::denies('sidebar_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sidebar->load('lang');

        return view('admin.sidebars.show', compact('sidebar'));
    }

    public function destroy(Sidebar $sidebar)
    {
        abort_if(Gate::denies('sidebar_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sidebar->delete();

        return back();
    }

    public function massDestroy(MassDestroySidebarRequest $request)
    {
        $sidebars = Sidebar::find(request('ids'));

        foreach ($sidebars as $sidebar) {
            $sidebar->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('sidebar_create') && Gate::denies('sidebar_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Sidebar();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}