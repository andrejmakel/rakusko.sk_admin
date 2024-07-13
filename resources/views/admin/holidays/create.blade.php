@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.holiday.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.holidays.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="date">{{ trans('cruds.holiday.fields.date') }}</label>
                <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date') }}">
                @if($errors->has('date'))
                    <span class="text-danger">{{ $errors->first('date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.holiday.fields.date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="holiday_name_id">{{ trans('cruds.holiday.fields.holiday_name') }}</label>
                <select class="form-control select2 {{ $errors->has('holiday_name') ? 'is-invalid' : '' }}" name="holiday_name_id" id="holiday_name_id">
                    @foreach($holiday_names as $id => $entry)
                        <option value="{{ $id }}" {{ old('holiday_name_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('holiday_name'))
                    <span class="text-danger">{{ $errors->first('holiday_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.holiday.fields.holiday_name_helper') }}</span>
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