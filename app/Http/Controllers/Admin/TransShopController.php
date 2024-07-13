<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyTransShopRequest;
use App\Http\Requests\StoreTransShopRequest;
use App\Http\Requests\UpdateTransShopRequest;
use App\Models\Lang;
use App\Models\Shop;
use App\Models\TransShop;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class TransShopController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('trans_shop_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transShops = TransShop::with(['lang', 'origin'])->get();

        return view('admin.transShops.index', compact('transShops'));
    }

    public function create()
    {
        abort_if(Gate::denies('trans_shop_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $langs = Lang::pluck('lang', 'id')->prepend(trans('global.pleaseSelect'), '');

        $origins = Shop::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.transShops.create', compact('langs', 'origins'));
    }

    public function store(StoreTransShopRequest $request)
    {
        $transShop = TransShop::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $transShop->id]);
        }

        return redirect()->route('admin.trans-shops.index');
    }

    public function edit(TransShop $transShop)
    {
        abort_if(Gate::denies('trans_shop_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $langs = Lang::pluck('lang', 'id')->prepend(trans('global.pleaseSelect'), '');

        $origins = Shop::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $transShop->load('lang', 'origin');

        return view('admin.transShops.edit', compact('langs', 'origins', 'transShop'));
    }

    public function update(UpdateTransShopRequest $request, TransShop $transShop)
    {
        $transShop->update($request->all());

        return redirect()->route('admin.trans-shops.index');
    }

    public function show(TransShop $transShop)
    {
        abort_if(Gate::denies('trans_shop_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transShop->load('lang', 'origin');

        return view('admin.transShops.show', compact('transShop'));
    }

    public function destroy(TransShop $transShop)
    {
        abort_if(Gate::denies('trans_shop_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transShop->delete();

        return back();
    }

    public function massDestroy(MassDestroyTransShopRequest $request)
    {
        $transShops = TransShop::find(request('ids'));

        foreach ($transShops as $transShop) {
            $transShop->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('trans_shop_create') && Gate::denies('trans_shop_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new TransShop();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
