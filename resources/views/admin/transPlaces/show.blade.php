@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.transPlace.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.trans-places.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.transPlace.fields.id') }}
                        </th>
                        <td>
                            {{ $transPlace->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transPlace.fields.lang') }}
                        </th>
                        <td>
                            {{ $transPlace->lang->lang ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transPlace.fields.order') }}
                        </th>
                        <td>
                            {{ $transPlace->order }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transPlace.fields.title') }}
                        </th>
                        <td>
                            {{ $transPlace->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transPlace.fields.subtitle') }}
                        </th>
                        <td>
                            {{ $transPlace->subtitle }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transPlace.fields.slug') }}
                        </th>
                        <td>
                            {{ $transPlace->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transPlace.fields.excerp') }}
                        </th>
                        <td>
                            {!! $transPlace->excerp !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transPlace.fields.text') }}
                        </th>
                        <td>
                            {!! $transPlace->text !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Opening note
                        </th>
                        <td>
                            {!! $transPlace->opening_note !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Price note
                        </th>
                        <td>
                            {!! $transPlace->price_note !!}
                        </td>
                    </tr>
                    
                    <tr>
                        <th>
                            {{ trans('cruds.transPlace.fields.opening') }}
                        </th>
                        <td>
                            {!! $transPlace->kontakt !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transPlace.fields.parking') }}
                        </th>
                        <td>
                            {!! $transPlace->parking !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transPlace.fields.info') }}
                        </th>
                        <td>
                            {!! $transPlace->info !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Link
                        </th>
                        <td>
                            {{ $transPlace->link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Origin ID
                        </th>
                        <td>
                            {{ $transPlace->origin->id ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.trans-places.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection