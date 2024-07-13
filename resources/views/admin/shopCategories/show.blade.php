@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.shopCategory.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.shop-categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.shopCategory.fields.id') }}
                        </th>
                        <td>
                            {{ $shopCategory->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shopCategory.fields.title_sk') }}
                        </th>
                        <td>
                            {{ $shopCategory->title_sk }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shopCategory.fields.title_de') }}
                        </th>
                        <td>
                            {{ $shopCategory->title_de }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shopCategory.fields.title_cs') }}
                        </th>
                        <td>
                            {{ $shopCategory->title_cs }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shopCategory.fields.title_hu') }}
                        </th>
                        <td>
                            {{ $shopCategory->title_hu }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shopCategory.fields.title_sl') }}
                        </th>
                        <td>
                            {{ $shopCategory->title_sl }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.shop-categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection