@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.price.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.prices.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.price.fields.id') }}
                        </th>
                        <td>
                            {{ $price->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.price.fields.price') }}
                        </th>
                        <td>
                            {{ $price->price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.price.fields.price_text') }}
                        </th>
                        <td>
                            {{ $price->price_text->sk ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.prices.index') }}">
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
            <a class="nav-link" href="#price_places" role="tab" data-toggle="tab">
                {{ trans('cruds.place.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#price_posts" role="tab" data-toggle="tab">
                {{ trans('cruds.post.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#price_infos" role="tab" data-toggle="tab">
                {{ trans('cruds.info.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="price_places">
            @includeIf('admin.prices.relationships.pricePlaces', ['places' => $price->pricePlaces])
        </div>
        <div class="tab-pane" role="tabpanel" id="price_posts">
            @includeIf('admin.prices.relationships.pricePosts', ['posts' => $price->pricePosts])
        </div>
        <div class="tab-pane" role="tabpanel" id="price_infos">
            @includeIf('admin.prices.relationships.priceInfos', ['infos' => $price->priceInfos])
        </div>
    </div>
</div>

@endsection