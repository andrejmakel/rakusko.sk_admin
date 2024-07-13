@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.opening.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.openings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.opening.fields.id') }}
                        </th>
                        <td>
                            {{ $opening->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.opening.fields.open_hours') }}
                        </th>
                        <td>
                            {{ $opening->open_hours }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.opening.fields.open_text') }}
                        </th>
                        <td>
                            {{ $opening->open_text->sk ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.openings.index') }}">
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
            <a class="nav-link" href="#opening_malls" role="tab" data-toggle="tab">
                {{ trans('cruds.mall.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#opening_shops" role="tab" data-toggle="tab">
                {{ trans('cruds.shop.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#opening_places" role="tab" data-toggle="tab">
                {{ trans('cruds.place.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#opening_posts" role="tab" data-toggle="tab">
                {{ trans('cruds.post.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#opening_infos" role="tab" data-toggle="tab">
                {{ trans('cruds.info.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="opening_malls">
            @includeIf('admin.openings.relationships.openingMalls', ['malls' => $opening->openingMalls])
        </div>
        <div class="tab-pane" role="tabpanel" id="opening_shops">
            @includeIf('admin.openings.relationships.openingShops', ['shops' => $opening->openingShops])
        </div>
        <div class="tab-pane" role="tabpanel" id="opening_places">
            @includeIf('admin.openings.relationships.openingPlaces', ['places' => $opening->openingPlaces])
        </div>
        <div class="tab-pane" role="tabpanel" id="opening_posts">
            @includeIf('admin.openings.relationships.openingPosts', ['posts' => $opening->openingPosts])
        </div>
        <div class="tab-pane" role="tabpanel" id="opening_infos">
            @includeIf('admin.openings.relationships.openingInfos', ['infos' => $opening->openingInfos])
        </div>
    </div>
</div>

@endsection