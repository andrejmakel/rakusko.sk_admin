@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.carousel.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.carousels.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.carousel.fields.id') }}
                        </th>
                        <td>
                            {{ $carousel->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carousel.fields.lang') }}
                        </th>
                        <td>
                            {{ $carousel->lang->lang ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carousel.fields.cover_img') }}
                        </th>
                        <td>
                            @if($carousel->cover_img)
                                <a href="{{ $carousel->cover_img->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $carousel->cover_img->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carousel.fields.cover_img_mobile') }}
                        </th>
                        <td>
                            @if($carousel->cover_img_mobile)
                                <a href="{{ $carousel->cover_img_mobile->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $carousel->cover_img_mobile->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carousel.fields.title') }}
                        </th>
                        <td>
                            {{ $carousel->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carousel.fields.subtitle') }}
                        </th>
                        <td>
                            {{ $carousel->subtitle }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carousel.fields.btn_1') }}
                        </th>
                        <td>
                            {{ $carousel->btn_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carousel.fields.btn_2') }}
                        </th>
                        <td>
                            {{ $carousel->btn_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carousel.fields.btn_3') }}
                        </th>
                        <td>
                            {{ $carousel->btn_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carousel.fields.btn_1_link') }}
                        </th>
                        <td>
                            {{ $carousel->btn_1_link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carousel.fields.btn_2_link') }}
                        </th>
                        <td>
                            {{ $carousel->btn_2_link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carousel.fields.btn_3_link') }}
                        </th>
                        <td>
                            {{ $carousel->btn_3_link }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.carousels.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection