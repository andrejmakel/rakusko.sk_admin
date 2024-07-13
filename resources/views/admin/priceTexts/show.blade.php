@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.priceText.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.price-texts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.priceText.fields.id') }}
                        </th>
                        <td>
                            {{ $priceText->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.priceText.fields.sk') }}
                        </th>
                        <td>
                            {{ $priceText->sk }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.priceText.fields.de') }}
                        </th>
                        <td>
                            {{ $priceText->de }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.priceText.fields.cs') }}
                        </th>
                        <td>
                            {{ $priceText->cs }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.priceText.fields.hu') }}
                        </th>
                        <td>
                            {{ $priceText->hu }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.priceText.fields.sl') }}
                        </th>
                        <td>
                            {{ $priceText->sl }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.price-texts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection