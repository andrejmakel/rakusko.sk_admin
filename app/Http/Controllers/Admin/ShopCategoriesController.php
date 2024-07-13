<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyShopCategoryRequest;
use App\Http\Requests\StoreShopCategoryRequest;
use App\Http\Requests\UpdateShopCategoryRequest;
use App\Models\ShopCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Exception;

class ShopCategoriesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('shop_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shopCategories = ShopCategory::all();

        return view('admin.shopCategories.index', compact('shopCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('shop_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.shopCategories.create');
    }

    public function store(StoreShopCategoryRequest $request)
    {
        
        $shopCategory = ShopCategory::create($request->all());

        return redirect()->route('admin.shop-categories.index');
    }

    public function edit(ShopCategory $shopCategory)
    {
        abort_if(Gate::denies('shop_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.shopCategories.edit', compact('shopCategory'));
    }

    public function update(UpdateShopCategoryRequest $request, ShopCategory $shopCategory)
    {
        $shopCategory->update($request->all());

        return redirect()->route('admin.shop-categories.index');
    }

    public function show(ShopCategory $shopCategory)
    {
        abort_if(Gate::denies('shop_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.shopCategories.show', compact('shopCategory'));
    }

    public function destroy(ShopCategory $shopCategory)
    {
        abort_if(Gate::denies('shop_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try{
            $shopCategory->delete();
            return back();
        }catch(Exception $e){
            $shopCategory->shops()->detach();
            $shopCategory->delete();
        }
        

        return back();
    }

    public function massDestroy(MassDestroyShopCategoryRequest $request)
    {
        $shopCategories = ShopCategory::find(request('ids'));

        foreach ($shopCategories as $shopCategory) {
            $shopCategory->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
