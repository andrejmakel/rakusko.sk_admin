@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.priceText.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.price-texts.update", [$priceText->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="sk">{{ trans('cruds.priceText.fields.sk') }}</label>
                <input class="form-control {{ $errors->has('sk') ? 'is-invalid' : '' }}" type="text" name="sk" id="sk" value="{{ old('sk', $priceText->sk) }}">
                @if($errors->has('sk'))
                    <span class="text-danger">{{ $errors->first('sk') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.priceText.fields.sk_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="de">{{ trans('cruds.priceText.fields.de') }}</label>
                <input class="form-control {{ $errors->has('de') ? 'is-invalid' : '' }}" type="text" name="de" id="de" value="{{ old('de', $priceText->de) }}">
                @if($errors->has('de'))
                    <span class="text-danger">{{ $errors->first('de') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.priceText.fields.de_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cs">{{ trans('cruds.priceText.fields.cs') }}</label>
                <input class="form-control {{ $errors->has('cs') ? 'is-invalid' : '' }}" type="text" name="cs" id="cs" value="{{ old('cs', $priceText->cs) }}">
                @if($errors->has('cs'))
                    <span class="text-danger">{{ $errors->first('cs') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.priceText.fields.cs_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hu">{{ trans('cruds.priceText.fields.hu') }}</label>
                <input class="form-control {{ $errors->has('hu') ? 'is-invalid' : '' }}" type="text" name="hu" id="hu" value="{{ old('hu', $priceText->hu) }}">
                @if($errors->has('hu'))
                    <span class="text-danger">{{ $errors->first('hu') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.priceText.fields.hu_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sl">{{ trans('cruds.priceText.fields.sl') }}</label>
                <input class="form-control {{ $errors->has('sl') ? 'is-invalid' : '' }}" type="text" name="sl" id="sl" value="{{ old('sl', $priceText->sl) }}">
                @if($errors->has('sl'))
                    <span class="text-danger">{{ $errors->first('sl') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.priceText.fields.sl_helper') }}</span>
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