@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.info.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.infos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.info.fields.id') }}
                        </th>
                        <td>
                            {{ $info->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.info.fields.order') }}
                        </th>
                        <td>
                            {{ $info->order }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.info.fields.title') }}
                        </th>
                        <td>
                            {{ $info->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.info.fields.subtitle') }}
                        </th>
                        <td>
                            {{ $info->subtitle }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.info.fields.slug') }}
                        </th>
                        <td>
                            {{ $info->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.info.fields.cover_img') }}
                        </th>
                        <td>
                            @foreach($info->cover_img as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.info.fields.excerp') }}
                        </th>
                        <td>
                            {!! $info->excerp !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.info.fields.text') }}
                        </th>
                        <td>
                            {!! $info->text !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.info.fields.parking') }}
                        </th>
                        <td>
                            {!! $info->parking !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.info.fields.info') }}
                        </th>
                        <td>
                            {!! $info->info !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.info.fields.kontakt') }}
                        </th>
                        <td>
                            {!! $info->kontakt !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.info.fields.zip') }}
                        </th>
                        <td>
                            {{ $info->zip }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.info.fields.link') }}
                        </th>
                        <td>
                            {{ $info->link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.info.fields.update') }}
                        </th>
                        <td>
                            {{ $info->update }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.info.fields.tags') }}
                        </th>
                        <td>
                            @foreach($info->tags as $key => $tags)
                                <span class="label label-info">{{ $tags->title_sk }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.infos.index') }}">
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
            <a class="nav-link" href="#origin_trans_infos" role="tab" data-toggle="tab">
                {{ trans('cruds.transInfo.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="origin_trans_infos">
            @includeIf('admin.infos.relationships.originTransInfos', ['transInfos' => $info->originTransInfos])
        </div>
    </div>
</div>

@endsection