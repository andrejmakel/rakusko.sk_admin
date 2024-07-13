@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.opening.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.openings.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="open_hours">{{ trans('cruds.opening.fields.open_hours') }}</label>
                <input class="form-control {{ $errors->has('open_hours') ? 'is-invalid' : '' }}" type="text" name="open_hours" id="open_hours" value="{{ old('open_hours', '') }}" required>
                @if($errors->has('open_hours'))
                    <span class="text-danger">{{ $errors->first('open_hours') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.opening.fields.open_hours_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="open_text_id">{{ trans('cruds.opening.fields.open_text') }}</label>
                <select class="form-control select2 {{ $errors->has('open_text') ? 'is-invalid' : '' }}" name="open_text_id" id="open_text_id" required>
                    @foreach($open_texts as $id => $entry)
                        <option value="{{ $id }}" {{ old('open_text_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('open_text'))
                    <span class="text-danger">{{ $errors->first('open_text') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.opening.fields.open_text_helper') }}</span>
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