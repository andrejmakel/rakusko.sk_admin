<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyOpeningTextRequest;
use App\Http\Requests\StoreOpeningTextRequest;
use App\Http\Requests\UpdateOpeningTextRequest;
use App\Models\OpeningText;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OpeningTextController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('opening_text_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $openingTexts = OpeningText::all();

        return view('admin.openingTexts.index', compact('openingTexts'));
    }

    public function create()
    {
        abort_if(Gate::denies('opening_text_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.openingTexts.create');
    }

    public function store(StoreOpeningTextRequest $request)
    {
        $openingText = OpeningText::create($request->all());

        return redirect()->route('admin.opening-texts.index');
    }

    public function edit(OpeningText $openingText)
    {
        abort_if(Gate::denies('opening_text_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.openingTexts.edit', compact('openingText'));
    }

    public function update(UpdateOpeningTextRequest $request, OpeningText $openingText)
    {
        $openingText->update($request->all());

        return redirect()->route('admin.opening-texts.index');
    }

    public function show(OpeningText $openingText)
    {
        abort_if(Gate::denies('opening_text_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $openingText->load('openTextOpenings');

        return view('admin.openingTexts.show', compact('openingText'));
    }

    public function destroy(OpeningText $openingText)
    {
        abort_if(Gate::denies('opening_text_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $openingText->delete();

        return back();
    }

    public function massDestroy(MassDestroyOpeningTextRequest $request)
    {
        $openingTexts = OpeningText::find(request('ids'));

        foreach ($openingTexts as $openingText) {
            $openingText->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
