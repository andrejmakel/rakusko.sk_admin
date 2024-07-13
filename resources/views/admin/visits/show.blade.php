@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.visit.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.visits.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.visit.fields.id') }}
                        </th>
                        <td>
                            {{ $visit->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.visit.fields.ip') }}
                        </th>
                        <td>
                            {{ $visit->ip }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.visit.fields.domain') }}
                        </th>
                        <td>
                            {{ $visit->domain }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.visits.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection