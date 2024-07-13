@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.transPost.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.trans-posts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.transPost.fields.id') }}
                        </th>
                        <td>
                            {{ $transPost->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transPost.fields.lang') }}
                        </th>
                        <td>
                            {{ $transPost->lang->lang ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transPost.fields.order') }}
                        </th>
                        <td>
                            {{ $transPost->order }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transPost.fields.title') }}
                        </th>
                        <td>
                            {{ $transPost->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transPost.fields.subtitle') }}
                        </th>
                        <td>
                            {{ $transPost->subtitle }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transPost.fields.slug') }}
                        </th>
                        <td>
                            {{ $transPost->slug }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.transPost.fields.text') }}
                        </th>
                        <td>
                            {!! $transPost->text !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Link
                        </th>
                        <td>
                            {{ $transPost->link }}
                        </td>
                    </tr>
                    
                    <tr>
                        <th>
                            Origin ID
                        </th>
                        <td>
                            {{ $transPost->origin->id ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.trans-posts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection