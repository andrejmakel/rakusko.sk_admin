@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.shop.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.shops.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.shop.fields.id') }}
                        </th>
                        <td>
                            {{ $shop->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shop.fields.title') }}
                        </th>
                        <td>
                            {{ $shop->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shop.fields.slug') }}
                        </th>
                        <td>
                            {{ $shop->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Categories
                        </th>
                        <td>
                            {{ $shop->category->title_sk ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shop.fields.discount') }}
                        </th>
                        <td>
                            {{ $shop->discount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shop.fields.logo') }}
                        </th>
                        <td>
                            @if($shop->logo)
                                <a href="{{ $shop->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $shop->logo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shop.fields.text') }}
                        </th>
                        <td>
                            {!! $shop->text !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shop.fields.opening') }}
                        </th>
                        <td>
                            @foreach($shop->openings as $key => $opening)
                                <span class="label label-info">{{ $opening->open_hours }}</span>
                            @endforeach
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.shop.fields.gallery') }}
                        </th>
                        <td>
                            @foreach($shop->gallery as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shop.fields.map_img') }}
                        </th>
                        <td>
                            @if($shop->map_img)
                                <a href="{{ $shop->map_img->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $shop->map_img->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shop.fields.kontakt') }}
                        </th>
                        <td>
                            {!! $shop->kontakt !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shop.fields.zip') }}
                        </th>
                        <td>
                            {{ $shop->zip }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shop.fields.link') }}
                        </th>
                        <td>
                            {{ $shop->link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shop.fields.update') }}
                        </th>
                        <td>
                            {{ $shop->update }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shop.fields.mall') }}
                        </th>
                        <td>
                            {{ $shop->mall->title ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.shops.index') }}">
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
            <a class="nav-link" href="#origin_trans_shops" role="tab" data-toggle="tab">
                {{ trans('cruds.transShop.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="origin_trans_shops">
            @includeIf('admin.shops.relationships.originTransShops', ['transShops' => $shop->originTransShops])
        </div>
    </div>
</div>

@endsection