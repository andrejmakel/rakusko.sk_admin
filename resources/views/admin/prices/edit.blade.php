@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.price.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.prices.update", [$price->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="price">{{ trans('cruds.price.fields.price') }}</label>
                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="text" name="price" id="price" value="{{ old('price', $price->price) }}" required>
                @if($errors->has('price'))
                    <span class="text-danger">{{ $errors->first('price') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.price.fields.price_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="price_text_id">{{ trans('cruds.price.fields.price_text') }}</label>
                <select class="form-control select2 {{ $errors->has('price_text') ? 'is-invalid' : '' }}" name="price_text_id" id="price_text_id" required>
                    @foreach($price_texts as $id => $entry)
                        <option value="{{ $id }}" {{ (old('price_text_id') ? old('price_text_id') : $price->price_text->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('price_text'))
                    <span class="text-danger">{{ $errors->first('price_text') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.price.fields.price_text_helper') }}</span>
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