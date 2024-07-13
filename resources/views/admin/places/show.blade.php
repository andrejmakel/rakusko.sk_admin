@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.place.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.places.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.place.fields.id') }}
                        </th>
                        <td>
                            {{ $place->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.place.fields.order') }}
                        </th>
                        <td>
                            {{ $place->originTransPlaces[0]->order }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.place.fields.title') }}
                        </th>
                        <td>
                            {{ $place->originTransPlaces[0]->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.place.fields.slug') }}
                        </th>
                        <td>
                            {{ $place->originTransPlaces[0]->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.place.fields.cover_img') }}
                        </th>
                        <td>
                            @foreach($place->cover_img as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.place.fields.subtitle') }}
                        </th>
                        <td>
                            {{ $place->originTransPlaces[0]->subtitle }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.place.fields.excerp') }}
                        </th>
                        <td>
                            {!! $place->originTransPlaces[0]->excerp !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.place.fields.text') }}
                        </th>
                        <td>
                            {!! $place->originTransPlaces[0]->text !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.place.fields.opening') }}
                        </th>
                        <td>
                            @foreach($place->openings as $key => $opening)
                                <span class="label label-info">{{ $opening->open_hours }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.place.fields.price') }}
                        </th>
                        <td>
                            @foreach($place->prices as $key => $price)
                                <span class="label label-info">{{ $price->price }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.place.fields.parking') }}
                        </th>
                        <td>
                            {!! $place->originTransPlaces[0]->parking !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.place.fields.info') }}
                        </th>
                        <td>
                            {!! $place->originTransPlaces[0]->info !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.place.fields.kontakt') }}
                        </th>
                        <td>
                            {!! $place->originTransPlaces[0]->kontakt !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.place.fields.zip') }}
                        </th>
                        <td>
                            {{ $place->zip }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.place.fields.link') }}
                        </th>
                        <td>
                            {{ $place->originTransPlaces[0]->link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.place.fields.update') }}
                        </th>
                        <td>
                            {{ $place->update }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.place.fields.tags') }}
                        </th>
                        <td>
                            @foreach($place->tags as $key => $tags)
                                <span class="label label-info">{{ $tags->title_sk }}</span>
                            @endforeach
                        </td>
                    </tr>
                    
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.places.index') }}">
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
            <a class="nav-link" href="#origin_trans_places" role="tab" data-toggle="tab">
                {{ trans('cruds.transPlace.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="origin_trans_places">
            @includeIf('admin.places.relationships.originTransPlaces', ['transPlaces' => $place->originTransPlaces])
        </div>
    </div>
</div>

@endsection