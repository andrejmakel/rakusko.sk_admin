@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.navi.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.navis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.navi.fields.id') }}
                        </th>
                        <td>
                            {{ $navi->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.navi.fields.description') }}
                        </th>
                        <td>
                            {{ $navi->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.navi.fields.titel_1') }}
                        </th>
                        <td>
                            {{ $navi->titel_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.navi.fields.text_1') }}
                        </th>
                        <td>
                            {!! $navi->text_1 !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.navi.fields.titel_2') }}
                        </th>
                        <td>
                            {{ $navi->titel_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.navi.fields.text_2') }}
                        </th>
                        <td>
                            {!! $navi->text_2 !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.navi.fields.titel_3') }}
                        </th>
                        <td>
                            {{ $navi->titel_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.navi.fields.text_3') }}
                        </th>
                        <td>
                            {!! $navi->text_3 !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.navi.fields.titel_4') }}
                        </th>
                        <td>
                            {{ $navi->titel_4 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.navi.fields.text_4') }}
                        </th>
                        <td>
                            {!! $navi->text_4 !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.navi.fields.titel_5') }}
                        </th>
                        <td>
                            {{ $navi->titel_5 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.navi.fields.text_5') }}
                        </th>
                        <td>
                            {!! $navi->text_5 !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.navi.fields.coordinates') }}
                        </th>
                        <td>
                            {{ $navi->coordinates }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.navi.fields.zoom') }}
                        </th>
                        <td>
                            {{ $navi->zoom }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.navis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection