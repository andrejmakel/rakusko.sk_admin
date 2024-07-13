<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyOpeningRequest;
use App\Http\Requests\StoreOpeningRequest;
use App\Http\Requests\UpdateOpeningRequest;
use App\Models\Opening;
use App\Models\OpeningText;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OpeningController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('opening_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $openings = Opening::with(['open_text'])->get();

        return view('admin.openings.index', compact('openings'));
    }

    public function create()
    {
        abort_if(Gate::denies('opening_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $open_texts = OpeningText::pluck('sk', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.openings.create', compact('open_texts'));
    }

    public function store(StoreOpeningRequest $request)
    {
        $opening = Opening::create($request->all());

        return redirect()->route('admin.openings.index');
    }

    public function edit(Opening $opening)
    {
        abort_if(Gate::denies('opening_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $open_texts = OpeningText::pluck('sk', 'id')->prepend(trans('global.pleaseSelect'), '');

        $opening->load('open_text');

        return view('admin.openings.edit', compact('open_texts', 'opening'));
    }

    public function update(UpdateOpeningRequest $request, Opening $opening)
    {
        $opening->update($request->all());

        return redirect()->route('admin.openings.index');
    }

    public function show(Opening $opening)
    {
        abort_if(Gate::denies('opening_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $opening->load('open_text', 'openingMalls', 'openingShops', 'openingPlaces', 'openingPosts', 'openingInfos');

        return view('admin.openings.show', compact('opening'));
    }

    public function destroy(Opening $opening)
    {
        abort_if(Gate::denies('opening_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $opening->delete();

        return back();
    }

    public function massDestroy(MassDestroyOpeningRequest $request)
    {
        $openings = Opening::find(request('ids'));

        foreach ($openings as $opening) {
            $opening->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
