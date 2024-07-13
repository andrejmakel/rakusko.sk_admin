<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyHolidayNameRequest;
use App\Http\Requests\StoreHolidayNameRequest;
use App\Http\Requests\UpdateHolidayNameRequest;
use App\Models\HolidayName;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HolidayNameController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('holiday_name_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $holidayNames = HolidayName::all();

        return view('admin.holidayNames.index', compact('holidayNames'));
    }

    public function create()
    {
        abort_if(Gate::denies('holiday_name_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.holidayNames.create');
    }

    public function store(StoreHolidayNameRequest $request)
    {
        $holidayName = HolidayName::create($request->all());

        return redirect()->route('admin.holiday-names.index');
    }

    public function edit(HolidayName $holidayName)
    {
        abort_if(Gate::denies('holiday_name_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.holidayNames.edit', compact('holidayName'));
    }

    public function update(UpdateHolidayNameRequest $request, HolidayName $holidayName)
    {
        $holidayName->update($request->all());

        return redirect()->route('admin.holiday-names.index');
    }

    public function show(HolidayName $holidayName)
    {
        abort_if(Gate::denies('holiday_name_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $holidayName->load('holidayNameHolidays');

        return view('admin.holidayNames.show', compact('holidayName'));
    }

    public function destroy(HolidayName $holidayName)
    {
        abort_if(Gate::denies('holiday_name_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $holidayName->delete();

        return back();
    }

    public function massDestroy(MassDestroyHolidayNameRequest $request)
    {
        $holidayNames = HolidayName::find(request('ids'));

        foreach ($holidayNames as $holidayName) {
            $holidayName->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
