@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.ad.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.ads.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.ad.fields.id') }}
                        </th>
                        <td>
                            {{ $ad->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ad.fields.order') }}
                        </th>
                        <td>
                            {{ $ad->order }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ad.fields.title') }}
                        </th>
                        <td>
                            {{ $ad->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ad.fields.subtitle') }}
                        </th>
                        <td>
                            {{ $ad->subtitle }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ad.fields.link') }}
                        </th>
                        <td>
                            {{ $ad->link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ad.fields.cover_img') }}
                        </th>
                        <td>
                            @if($ad->cover_img)
                                <a href="{{ $ad->cover_img->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $ad->cover_img->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ad.fields.lang') }}
                        </th>
                        <td>
                            {{ $ad->lang->lang ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ad.fields.mall') }}
                        </th>
                        <td>
                            @foreach($ad->malls as $key => $mall)
                                <span class="label label-info">{{ $mall->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ad.fields.place') }}
                        </th>
                        <td>
                            @foreach($ad->places as $key => $place)
                                <span class="label label-info">{{ $place->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ad.fields.post') }}
                        </th>
                        <td>
                            @foreach($ad->posts as $key => $post)
                                <span class="label label-info">{{ $post->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ad.fields.info') }}
                        </th>
                        <td>
                            @foreach($ad->infos as $key => $info)
                                <span class="label label-info">{{ $info->order }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.ads.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection