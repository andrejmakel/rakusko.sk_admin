@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.mall.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.malls.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.mall.fields.id') }}
                        </th>
                        <td>
                            {{ $mall->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mall.fields.order') }}
                        </th>
                        <td>
                            {{ $mall->order }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mall.fields.title') }}
                        </th>
                        <td>
                            {{ $mall->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mall.fields.slug') }}
                        </th>
                        <td>
                            {{ $mall->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mall.fields.map_embed') }}
                        </th>
                        <td>
                            {{ $mall->map_embed }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mall.fields.cover_img') }}
                        </th>
                        <td>
                            @foreach($mall->cover_img as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mall.fields.subtitle') }}
                        </th>
                        <td>
                            {{ $mall->subtitle }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mall.fields.text') }}
                        </th>
                        <td>
                            {!! $mall->text !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mall.fields.parking') }}
                        </th>
                        <td>
                            {!! $mall->parking !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mall.fields.info') }}
                        </th>
                        <td>
                            {!! $mall->info !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mall.fields.kontakt') }}
                        </th>
                        <td>
                            {!! $mall->kontakt !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mall.fields.zip') }}
                        </th>
                        <td>
                            {{ $mall->zip }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mall.fields.link') }}
                        </th>
                        <td>
                            {{ $mall->link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mall.fields.update') }}
                        </th>
                        <td>
                            {{ $mall->update }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.malls.index') }}">
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
            <a class="nav-link" href="#mall_shops" role="tab" data-toggle="tab">
                {{ trans('cruds.shop.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#origin_trans_malls" role="tab" data-toggle="tab">
                {{ trans('cruds.transMall.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="mall_shops">
            @includeIf('admin.malls.relationships.mallShops', ['shops' => $mall->mallShops])
        </div>
        <div class="tab-pane" role="tabpanel" id="origin_trans_malls">
            @includeIf('admin.malls.relationships.originTransMalls', ['transMalls' => $mall->originTransMalls])
        </div>
    </div>
</div>

@endsection