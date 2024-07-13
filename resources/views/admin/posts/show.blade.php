@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.post.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.posts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.post.fields.id') }}
                        </th>
                        <td>
                            {{ $post->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.post.fields.order') }}
                        </th>
                        <td>
                            {{ $post->order }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.post.fields.title') }}
                        </th>
                        <td>
                            {{ $post->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.post.fields.slug') }}
                        </th>
                        <td>
                            {{ $post->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.post.fields.cover_img') }}
                        </th>
                        <td>
                            @foreach($post->cover_img as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.post.fields.subtitle') }}
                        </th>
                        <td>
                            {{ $post->subtitle }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.post.fields.text') }}
                        </th>
                        <td>
                            {!! $post->text !!}
                        </td>
                    </tr>
                    
                    <tr>
                        <th>
                            {{ trans('cruds.post.fields.tags') }}
                        </th>
                        <td>
                            @foreach($post->tags as $key => $tags)
                                <span class="label label-info">{{ $tags->title_sk }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Activities
                        </th>
                        <td>
                            @foreach($post->activities as $key => $activity)
                                <span class="label label-info">{{ $activity->title_de }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.posts.index') }}">
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
            <a class="nav-link" href="#origin_trans_posts" role="tab" data-toggle="tab">
                {{ trans('cruds.transPost.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="origin_trans_posts">
            @includeIf('admin.posts.relationships.originTransPosts', ['transPosts' => $post->originTransPosts])
        </div>
    </div>
</div>

@endsection