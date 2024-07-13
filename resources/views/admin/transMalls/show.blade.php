@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.transMall.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.trans-malls.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.transMall.fields.id') }}
                        </th>
                        <td>
                            {{ $transMall->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transMall.fields.lang') }}
                        </th>
                        <td>
                            {{ $transMall->lang->lang ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transMall.fields.order') }}
                        </th>
                        <td>
                            {{ $transMall->order }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transMall.fields.title') }}
                        </th>
                        <td>
                            {{ $transMall->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transMall.fields.subtitle') }}
                        </th>
                        <td>
                            {{ $transMall->subtitle }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transMall.fields.slug') }}
                        </th>
                        <td>
                            {{ $transMall->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transMall.fields.text') }}
                        </th>
                        <td>
                            {!! $transMall->text !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transMall.fields.open_note_1') }}
                        </th>
                        <td>
                            {{ $transMall->link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transMall.fields.origin') }}
                        </th>
                        <td>
                            {{ $transMall->origin->title ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.trans-malls.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection