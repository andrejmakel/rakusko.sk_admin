@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.carousel.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.carousels.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="lang_id">{{ trans('cruds.carousel.fields.lang') }}</label>
                <select class="form-control select2 {{ $errors->has('lang') ? 'is-invalid' : '' }}" name="lang_id" id="lang_id">
                    @foreach($langs as $id => $entry)
                        <option value="{{ $id }}" {{ old('lang_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('lang'))
                    <span class="text-danger">{{ $errors->first('lang') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.carousel.fields.lang_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="cover_img">{{ trans('cruds.carousel.fields.cover_img') }}</label>
                <div class="needsclick dropzone {{ $errors->has('cover_img') ? 'is-invalid' : '' }}" id="cover_img-dropzone">
                </div>
                @if($errors->has('cover_img'))
                    <span class="text-danger">{{ $errors->first('cover_img') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.carousel.fields.cover_img_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cover_img_mobile">{{ trans('cruds.carousel.fields.cover_img_mobile') }}</label>
                <div class="needsclick dropzone {{ $errors->has('cover_img_mobile') ? 'is-invalid' : '' }}" id="cover_img_mobile-dropzone">
                </div>
                @if($errors->has('cover_img_mobile'))
                    <span class="text-danger">{{ $errors->first('cover_img_mobile') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.carousel.fields.cover_img_mobile_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.carousel.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.carousel.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="subtitle">{{ trans('cruds.carousel.fields.subtitle') }}</label>
                <input class="form-control {{ $errors->has('subtitle') ? 'is-invalid' : '' }}" type="text" name="subtitle" id="subtitle" value="{{ old('subtitle', '') }}">
                @if($errors->has('subtitle'))
                    <span class="text-danger">{{ $errors->first('subtitle') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.carousel.fields.subtitle_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="btn_1">{{ trans('cruds.carousel.fields.btn_1') }}</label>
                <input class="form-control {{ $errors->has('btn_1') ? 'is-invalid' : '' }}" type="text" name="btn_1" id="btn_1" value="{{ old('btn_1', '') }}">
                @if($errors->has('btn_1'))
                    <span class="text-danger">{{ $errors->first('btn_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.carousel.fields.btn_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="btn_2">{{ trans('cruds.carousel.fields.btn_2') }}</label>
                <input class="form-control {{ $errors->has('btn_2') ? 'is-invalid' : '' }}" type="text" name="btn_2" id="btn_2" value="{{ old('btn_2', '') }}">
                @if($errors->has('btn_2'))
                    <span class="text-danger">{{ $errors->first('btn_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.carousel.fields.btn_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="btn_3">{{ trans('cruds.carousel.fields.btn_3') }}</label>
                <input class="form-control {{ $errors->has('btn_3') ? 'is-invalid' : '' }}" type="text" name="btn_3" id="btn_3" value="{{ old('btn_3', '') }}">
                @if($errors->has('btn_3'))
                    <span class="text-danger">{{ $errors->first('btn_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.carousel.fields.btn_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="btn_1_link">{{ trans('cruds.carousel.fields.btn_1_link') }}</label>
                <input class="form-control {{ $errors->has('btn_1_link') ? 'is-invalid' : '' }}" type="text" name="btn_1_link" id="btn_1_link" value="{{ old('btn_1_link', '') }}">
                @if($errors->has('btn_1_link'))
                    <span class="text-danger">{{ $errors->first('btn_1_link') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.carousel.fields.btn_1_link_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="btn_2_link">{{ trans('cruds.carousel.fields.btn_2_link') }}</label>
                <input class="form-control {{ $errors->has('btn_2_link') ? 'is-invalid' : '' }}" type="text" name="btn_2_link" id="btn_2_link" value="{{ old('btn_2_link', '') }}">
                @if($errors->has('btn_2_link'))
                    <span class="text-danger">{{ $errors->first('btn_2_link') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.carousel.fields.btn_2_link_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="btn_3_link">{{ trans('cruds.carousel.fields.btn_3_link') }}</label>
                <input class="form-control {{ $errors->has('btn_3_link') ? 'is-invalid' : '' }}" type="text" name="btn_3_link" id="btn_3_link" value="{{ old('btn_3_link', '') }}">
                @if($errors->has('btn_3_link'))
                    <span class="text-danger">{{ $errors->first('btn_3_link') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.carousel.fields.btn_3_link_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.coverImgDropzone = {
    url: '{{ route('admin.carousels.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="cover_img"]').remove()
      $('form').append('<input type="hidden" name="cover_img" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="cover_img"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($carousel) && $carousel->cover_img)
      var file = {!! json_encode($carousel->cover_img) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="cover_img" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script>
<script>
    Dropzone.options.coverImgMobileDropzone = {
    url: '{{ route('admin.carousels.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="cover_img_mobile"]').remove()
      $('form').append('<input type="hidden" name="cover_img_mobile" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="cover_img_mobile"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($carousel) && $carousel->cover_img_mobile)
      var file = {!! json_encode($carousel->cover_img_mobile) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="cover_img_mobile" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script>
@endsection