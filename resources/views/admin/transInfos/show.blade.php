@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.transInfo.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.trans-infos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.transInfo.fields.id') }}
                        </th>
                        <td>
                            {{ $transInfo->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transInfo.fields.lang') }}
                        </th>
                        <td>
                            {{ $transInfo->lang->lang ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transInfo.fields.order') }}
                        </th>
                        <td>
                            {{ $transInfo->order }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transInfo.fields.title') }}
                        </th>
                        <td>
                            {{ $transInfo->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transInfo.fields.subtitle') }}
                        </th>
                        <td>
                            {{ $transInfo->subtitle }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transInfo.fields.slug') }}
                        </th>
                        <td>
                            {{ $transInfo->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transInfo.fields.text') }}
                        </th>
                        <td>
                            {!! $transInfo->text !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Link
                        </th>
                        <td>
                            {{ $transInfo->link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Origin ID
                        </th>
                        <td>
                            {{ $transInfo->origin->id ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.trans-infos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection