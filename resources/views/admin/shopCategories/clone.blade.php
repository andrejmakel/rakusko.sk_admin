@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.shopCategory.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.shop-categories.store", [$shopCategory->id]) }}" enctype="multipart/form-data">
            
            @csrf
            <div class="form-group">
                <label class="required" for="title_sk">{{ trans('cruds.shopCategory.fields.title_sk') }}</label>
                <input class="form-control {{ $errors->has('title_sk') ? 'is-invalid' : '' }}" type="text" name="title_sk" id="title_sk" value="{{ old('title_sk', $shopCategory->title_sk) }}" required>
                @if($errors->has('title_sk'))
                    <span class="text-danger">{{ $errors->first('title_sk') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.shopCategory.fields.title_sk_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="title_de">{{ trans('cruds.shopCategory.fields.title_de') }}</label>
                <input class="form-control {{ $errors->has('title_de') ? 'is-invalid' : '' }}" type="text" name="title_de" id="title_de" value="{{ old('title_de', $shopCategory->title_de) }}">
                @if($errors->has('title_de'))
                    <span class="text-danger">{{ $errors->first('title_de') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.shopCategory.fields.title_de_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="title_cz">{{ trans('cruds.shopCategory.fields.title_cz') }}</label>
                <input class="form-control {{ $errors->has('title_cz') ? 'is-invalid' : '' }}" type="text" name="title_cz" id="title_cz" value="{{ old('title_cz', $shopCategory->title_cz) }}">
                @if($errors->has('title_cz'))
                    <span class="text-danger">{{ $errors->first('title_cz') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.shopCategory.fields.title_cz_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="title_hu">{{ trans('cruds.shopCategory.fields.title_hu') }}</label>
                <input class="form-control {{ $errors->has('title_hu') ? 'is-invalid' : '' }}" type="text" name="title_hu" id="title_hu" value="{{ old('title_hu', $shopCategory->title_hu) }}">
                @if($errors->has('title_hu'))
                    <span class="text-danger">{{ $errors->first('title_hu') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.shopCategory.fields.title_hu_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="title_si">{{ trans('cruds.shopCategory.fields.title_si') }}</label>
                <input class="form-control {{ $errors->has('title_si') ? 'is-invalid' : '' }}" type="text" name="title_si" id="title_si" value="{{ old('title_si', $shopCategory->title_si) }}">
                @if($errors->has('title_si'))
                    <span class="text-danger">{{ $errors->first('title_si') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.shopCategory.fields.title_si_helper') }}</span>
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