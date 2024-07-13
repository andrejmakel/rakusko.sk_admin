@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.holidayName.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.holiday-names.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.holidayName.fields.id') }}
                        </th>
                        <td>
                            {{ $holidayName->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.holidayName.fields.title_sk') }}
                        </th>
                        <td>
                            {{ $holidayName->title_sk }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.holidayName.fields.title_cs') }}
                        </th>
                        <td>
                            {{ $holidayName->title_cs }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.holidayName.fields.title_de') }}
                        </th>
                        <td>
                            {{ $holidayName->title_de }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.holidayName.fields.title_hu') }}
                        </th>
                        <td>
                            {{ $holidayName->title_hu }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.holidayName.fields.title_sl') }}
                        </th>
                        <td>
                            {{ $holidayName->title_sl }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.holiday-names.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#holiday_name_holidays" role="tab" data-toggle="tab">
                {{ trans('cruds.holiday.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="holiday_name_holidays">
            @includeIf('admin.holidayNames.relationships.holidayNameHolidays', ['holidays' => $holidayName->holidayNameHolidays])
        </div>
    </div>
</div>

@endsection