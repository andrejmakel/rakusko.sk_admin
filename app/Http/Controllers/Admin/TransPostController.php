<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyTransPostRequest;
use App\Http\Requests\StoreTransPostRequest;
use App\Http\Requests\UpdateTransPostRequest;
use App\Models\Lang;
use App\Models\Post;
use App\Models\TransPost;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class TransPostController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('trans_post_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transPosts = TransPost::with(['lang', 'origin'])->get();

        return view('admin.transPosts.index', compact('transPosts'));
    }

    public function create()
    {
        abort_if(Gate::denies('trans_post_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $langs = Lang::pluck('lang', 'id')->prepend(trans('global.pleaseSelect'), '');

        $origins = Post::pluck('id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.transPosts.create', compact('langs', 'origins'));
    }

    public function store(StoreTransPostRequest $request)
    {
        $transPost = TransPost::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $transPost->id]);
        }

        return redirect()->route('admin.trans-posts.index');
    }

    public function edit(TransPost $transPost)
    {
        abort_if(Gate::denies('trans_post_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $langs = Lang::pluck('lang', 'id')->prepend(trans('global.pleaseSelect'), '');

        $origins = Post::pluck('id')->prepend(trans('global.pleaseSelect'), '');

        $transPost->load('lang', 'origin');

        return view('admin.transPosts.edit', compact('langs', 'origins', 'transPost'));
    }

    public function update(UpdateTransPostRequest $request, TransPost $transPost)
    {
        $transPost->update($request->all());

        return redirect()->route('admin.trans-posts.index');
    }

    public function show(TransPost $transPost)
    {
        abort_if(Gate::denies('trans_post_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transPost->load('lang', 'origin');

        return view('admin.transPosts.show', compact('transPost'));
    }

    public function destroy(TransPost $transPost)
    {
        abort_if(Gate::denies('trans_post_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transPost->delete();

        return back();
    }

    public function massDestroy(MassDestroyTransPostRequest $request)
    {
        $transPosts = TransPost::find(request('ids'));

        foreach ($transPosts as $transPost) {
            $transPost->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('trans_post_create') && Gate::denies('trans_post_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new TransPost();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
