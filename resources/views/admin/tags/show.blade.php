@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tag.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tags.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tag.fields.id') }}
                        </th>
                        <td>
                            {{ $tag->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tag.fields.title_sk') }}
                        </th>
                        <td>
                            {{ $tag->title_sk }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tag.fields.title_de') }}
                        </th>
                        <td>
                            {{ $tag->title_de }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tag.fields.title_cs') }}
                        </th>
                        <td>
                            {{ $tag->title_cs }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tag.fields.title_hu') }}
                        </th>
                        <td>
                            {{ $tag->title_hu }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tag.fields.title_sl') }}
                        </th>
                        <td>
                            {{ $tag->title_sl }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tags.index') }}">
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
            <a class="nav-link" href="#tags_places" role="tab" data-toggle="tab">
                {{ trans('cruds.place.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#tags_posts" role="tab" data-toggle="tab">
                {{ trans('cruds.post.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#tags_infos" role="tab" data-toggle="tab">
                {{ trans('cruds.info.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="tags_places">
            @includeIf('admin.tags.relationships.tagsPlaces', ['places' => $tag->tagsPlaces])
        </div>
        <div class="tab-pane" role="tabpanel" id="tags_posts">
            @includeIf('admin.tags.relationships.tagsPosts', ['posts' => $tag->tagsPosts])
        </div>
        <div class="tab-pane" role="tabpanel" id="tags_infos">
            @includeIf('admin.tags.relationships.tagsInfos', ['infos' => $tag->tagsInfos])
        </div>
    </div>
</div>

@endsection