@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.transShop.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.trans-shops.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.transShop.fields.id') }}
                        </th>
                        <td>
                            {{ $transShop->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transShop.fields.lang') }}
                        </th>
                        <td>
                            {{ $transShop->lang->lang ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transShop.fields.order') }}
                        </th>
                        <td>
                            {{ $transShop->order }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transShop.fields.title') }}
                        </th>
                        <td>
                            {{ $transShop->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transShop.fields.subtitle') }}
                        </th>
                        <td>
                            {{ $transShop->subtitle }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transShop.fields.slug') }}
                        </th>
                        <td>
                            {{ $transShop->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transShop.fields.text') }}
                        </th>
                        <td>
                            {!! $transShop->text !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Opening note
                        </th>
                        <td>
                            {{ $transShop->opening_note }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Link
                        </th>
                        <td>
                            {{ $transShop->link }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.transShop.fields.origin') }}
                        </th>
                        <td>
                            {{ $transShop->origin->title ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.trans-shops.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection