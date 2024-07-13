<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyPriceTextRequest;
use App\Http\Requests\StorePriceTextRequest;
use App\Http\Requests\UpdatePriceTextRequest;
use App\Models\PriceText;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PriceTextController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('price_text_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $priceTexts = PriceText::all();

        return view('admin.priceTexts.index', compact('priceTexts'));
    }

    public function create()
    {
        abort_if(Gate::denies('price_text_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.priceTexts.create');
    }

    public function store(StorePriceTextRequest $request)
    {
        $priceText = PriceText::create($request->all());

        return redirect()->route('admin.price-texts.index');
    }

    public function edit(PriceText $priceText)
    {
        abort_if(Gate::denies('price_text_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.priceTexts.edit', compact('priceText'));
    }

    public function update(UpdatePriceTextRequest $request, PriceText $priceText)
    {
        $priceText->update($request->all());

        return redirect()->route('admin.price-texts.index');
    }

    public function show(PriceText $priceText)
    {
        abort_if(Gate::denies('price_text_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.priceTexts.show', compact('priceText'));
    }

    public function destroy(PriceText $priceText)
    {
        abort_if(Gate::denies('price_text_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $priceText->delete();

        return back();
    }

    public function massDestroy(MassDestroyPriceTextRequest $request)
    {
        $priceTexts = PriceText::find(request('ids'));

        foreach ($priceTexts as $priceText) {
            $priceText->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
