@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.sidebar.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sidebars.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.sidebar.fields.id') }}
                        </th>
                        <td>
                            {{ $sidebar->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sidebar.fields.order') }}
                        </th>
                        <td>
                            {{ $sidebar->order }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sidebar.fields.title') }}
                        </th>
                        <td>
                            {{ $sidebar->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sidebar.fields.subtitle') }}
                        </th>
                        <td>
                            {{ $sidebar->subtitle }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sidebar.fields.link') }}
                        </th>
                        <td>
                            {{ $sidebar->link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sidebar.fields.cover_img') }}
                        </th>
                        <td>
                            @if($sidebar->cover_img)
                                <a href="{{ $sidebar->cover_img->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $sidebar->cover_img->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sidebar.fields.lang') }}
                        </th>
                        <td>
                            {{ $sidebar->lang->lang ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sidebars.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection