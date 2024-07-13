@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.holidayName.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.holiday-names.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title_sk">{{ trans('cruds.holidayName.fields.title_sk') }}</label>
                <input class="form-control {{ $errors->has('title_sk') ? 'is-invalid' : '' }}" type="text" name="title_sk" id="title_sk" value="{{ old('title_sk', '') }}">
                @if($errors->has('title_sk'))
                    <span class="text-danger">{{ $errors->first('title_sk') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.holidayName.fields.title_sk_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="title_cs">{{ trans('cruds.holidayName.fields.title_cs') }}</label>
                <input class="form-control {{ $errors->has('title_cs') ? 'is-invalid' : '' }}" type="text" name="title_cs" id="title_cs" value="{{ old('title_cs', '') }}">
                @if($errors->has('title_cs'))
                    <span class="text-danger">{{ $errors->first('title_cs') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.holidayName.fields.title_cs_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="title_de">{{ trans('cruds.holidayName.fields.title_de') }}</label>
                <input class="form-control {{ $errors->has('title_de') ? 'is-invalid' : '' }}" type="text" name="title_de" id="title_de" value="{{ old('title_de', '') }}">
                @if($errors->has('title_de'))
                    <span class="text-danger">{{ $errors->first('title_de') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.holidayName.fields.title_de_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="title_hu">{{ trans('cruds.holidayName.fields.title_hu') }}</label>
                <input class="form-control {{ $errors->has('title_hu') ? 'is-invalid' : '' }}" type="text" name="title_hu" id="title_hu" value="{{ old('title_hu', '') }}">
                @if($errors->has('title_hu'))
                    <span class="text-danger">{{ $errors->first('title_hu') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.holidayName.fields.title_hu_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="title_sl">{{ trans('cruds.holidayName.fields.title_sl') }}</label>
                <input class="form-control {{ $errors->has('title_sl') ? 'is-invalid' : '' }}" type="text" name="title_sl" id="title_sl" value="{{ old('title_sl', '') }}">
                @if($errors->has('title_sl'))
                    <span class="text-danger">{{ $errors->first('title_sl') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.holidayName.fields.title_sl_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection