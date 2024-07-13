<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCarouselRequest;
use App\Http\Requests\StoreCarouselRequest;
use App\Http\Requests\UpdateCarouselRequest;
use App\Models\Carousel;
use App\Models\Lang;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class CarouselController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('carousel_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carousels = Carousel::with(['lang', 'media'])->get();

        $langs = Lang::get();

        return view('admin.carousels.index', compact('carousels', 'langs'));
    }

    public function create()
    {
        abort_if(Gate::denies('carousel_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $langs = Lang::pluck('lang', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.carousels.create', compact('langs'));
    }

    public function store(StoreCarouselRequest $request)
    {
        $carousel = Carousel::create($request->all());

        if ($request->input('cover_img', false)) {
            $carousel->addMedia(storage_path('tmp/uploads/' . basename($request->input('cover_img'))))->toMediaCollection('cover_img');
        }

        if ($request->input('cover_img_mobile', false)) {
            $carousel->addMedia(storage_path('tmp/uploads/' . basename($request->input('cover_img_mobile'))))->toMediaCollection('cover_img_mobile');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $carousel->id]);
        }

        return redirect()->route('admin.carousels.index');
    }

    public function edit(Carousel $carousel)
    {
        abort_if(Gate::denies('carousel_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $langs = Lang::pluck('lang', 'id')->prepend(trans('global.pleaseSelect'), '');

        $carousel->load('lang');

        return view('admin.carousels.edit', compact('carousel', 'langs'));
    }

    public function update(UpdateCarouselRequest $request, Carousel $carousel)
    {
        $carousel->update($request->all());

        if ($request->input('cover_img', false)) {
            if (! $carousel->cover_img || $request->input('cover_img') !== $carousel->cover_img->file_name) {
                if ($carousel->cover_img) {
                    $carousel->cover_img->delete();
                }
                $carousel->addMedia(storage_path('tmp/uploads/' . basename($request->input('cover_img'))))->toMediaCollection('cover_img');
            }
        } elseif ($carousel->cover_img) {
            $carousel->cover_img->delete();
        }

        if ($request->input('cover_img_mobile', false)) {
            if (! $carousel->cover_img_mobile || $request->input('cover_img_mobile') !== $carousel->cover_img_mobile->file_name) {
                if ($carousel->cover_img_mobile) {
                    $carousel->cover_img_mobile->delete();
                }
                $carousel->addMedia(storage_path('tmp/uploads/' . basename($request->input('cover_img_mobile'))))->toMediaCollection('cover_img_mobile');
            }
        } elseif ($carousel->cover_img_mobile) {
            $carousel->cover_img_mobile->delete();
        }

        return redirect()->route('admin.carousels.index');
    }

    public function show(Carousel $carousel)
    {
        abort_if(Gate::denies('carousel_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carousel->load('lang');

        return view('admin.carousels.show', compact('carousel'));
    }

    public function destroy(Carousel $carousel)
    {
        abort_if(Gate::denies('carousel_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carousel->delete();

        return back();
    }

    public function massDestroy(MassDestroyCarouselRequest $request)
    {
        $carousels = Carousel::find(request('ids'));

        foreach ($carousels as $carousel) {
            $carousel->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('carousel_create') && Gate::denies('carousel_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Carousel();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
