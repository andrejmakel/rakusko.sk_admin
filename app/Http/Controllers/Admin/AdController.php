<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAdRequest;
use App\Http\Requests\StoreAdRequest;
use App\Http\Requests\UpdateAdRequest;
use App\Models\Ad;
use App\Models\Info;
use App\Models\Lang;
use App\Models\Mall;
use App\Models\Place;
use App\Models\Post;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class AdController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('ad_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ads = Ad::with(['lang', 'malls', 'places', 'posts', 'infos', 'media'])->get();

        $langs = Lang::get();

        $malls = Mall::get();

        $places = Place::get();

        $posts = Post::get();

        $infos = Info::get();

        return view('admin.ads.index', compact('ads', 'infos', 'langs', 'malls', 'places', 'posts'));
    }

    public function create()
    {
        abort_if(Gate::denies('ad_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $langs = Lang::pluck('lang', 'id')->prepend(trans('global.pleaseSelect'), '');

        $malls = Mall::pluck('title', 'id');

        $places = Place::all()->pluck('originTransPlaces.0.title', 'id')->toArray();

        $posts = Post::all()->pluck('originTransPosts.0.title', 'id')->toArray();

        $infos = Info::all()->pluck('originTransInfos.0.title', 'id')->toArray();
        
        return view('admin.ads.create', compact('infos', 'langs', 'malls', 'places', 'posts'));
    }

    public function store(StoreAdRequest $request)
    {
        $ad = Ad::create($request->all());
        $ad->malls()->sync($request->input('malls', []));
        $ad->places()->sync($request->input('places', []));
        $ad->posts()->sync($request->input('posts', []));
        $ad->infos()->sync($request->input('infos', []));
        if ($request->input('cover_img', false)) {
            $ad->addMedia(storage_path('tmp/uploads/' . basename($request->input('cover_img'))))->toMediaCollection('cover_img');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $ad->id]);
        }

        return redirect()->route('admin.ads.index');
    }

    public function edit(Ad $ad)
    {
        abort_if(Gate::denies('ad_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $langs = Lang::pluck('lang', 'id')->prepend(trans('global.pleaseSelect'), '');

        $malls = Mall::pluck('title', 'id');

        $places = Place::all()->pluck('originTransPlaces.0.title', 'id')->toArray();

        $posts = Post::all()->pluck('originTransPosts.0.title', 'id')->toArray();

        $infos = Info::all()->pluck('originTransInfos.0.title', 'id')->toArray();

        $ad->load('lang', 'malls', 'places', 'posts', 'infos');

        return view('admin.ads.edit', compact('ad', 'infos', 'langs', 'malls', 'places', 'posts'));
    }

    public function update(UpdateAdRequest $request, Ad $ad)
    {
        $ad->update($request->all());
        $ad->malls()->sync($request->input('malls', []));
        $ad->places()->sync($request->input('places', []));
        $ad->posts()->sync($request->input('posts', []));
        $ad->infos()->sync($request->input('infos', []));
        if ($request->input('cover_img', false)) {
            if (! $ad->cover_img || $request->input('cover_img') !== $ad->cover_img->file_name) {
                if ($ad->cover_img) {
                    $ad->cover_img->delete();
                }
                $ad->addMedia(storage_path('tmp/uploads/' . basename($request->input('cover_img'))))->toMediaCollection('cover_img');
            }
        } elseif ($ad->cover_img) {
            $ad->cover_img->delete();
        }

        return redirect()->route('admin.ads.index');
    }

    public function show(Ad $ad)
    {
        abort_if(Gate::denies('ad_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ad->load('lang', 'malls', 'places', 'posts', 'infos');

        return view('admin.ads.show', compact('ad'));
    }

    public function destroy(Ad $ad)
    {
        abort_if(Gate::denies('ad_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ad->delete();

        return back();
    }

    public function massDestroy(MassDestroyAdRequest $request)
    {
        $ads = Ad::find(request('ids'));

        foreach ($ads as $ad) {
            $ad->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('ad_create') && Gate::denies('ad_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Ad();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}