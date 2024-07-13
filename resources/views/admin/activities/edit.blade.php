@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.activity.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.activities.update", [$activity->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="order">{{ trans('cruds.activity.fields.order') }}</label>
                <input class="form-control {{ $errors->has('order') ? 'is-invalid' : '' }}" type="number" name="order" id="order" value="{{ old('order', $activity->order) }}" step="1" required>
                @if($errors->has('order'))
                    <span class="text-danger">{{ $errors->first('order') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.activity.fields.order_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cover_img">{{ trans('cruds.activity.fields.cover_img') }}</label>
                <div class="needsclick dropzone {{ $errors->has('cover_img') ? 'is-invalid' : '' }}" id="cover_img-dropzone">
                </div>
                @if($errors->has('cover_img'))
                    <span class="text-danger">{{ $errors->first('cover_img') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.activity.fields.cover_img_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title_sk">{{ trans('cruds.activity.fields.title_sk') }}</label>
                <input class="form-control {{ $errors->has('title_sk') ? 'is-invalid' : '' }}" type="text" name="title_sk" id="title_sk" value="{{ old('title_sk', $activity->title_sk) }}" required>
                @if($errors->has('title_sk'))
                    <span class="text-danger">{{ $errors->first('title_sk') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.activity.fields.title_sk_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title_de">{{ trans('cruds.activity.fields.title_de') }}</label>
                <input class="form-control {{ $errors->has('title_de') ? 'is-invalid' : '' }}" type="text" name="title_de" id="title_de" value="{{ old('title_de', $activity->title_de) }}" required>
                @if($errors->has('title_de'))
                    <span class="text-danger">{{ $errors->first('title_de') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.activity.fields.title_de_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title_cs">{{ trans('cruds.activity.fields.title_cs') }}</label>
                <input class="form-control {{ $errors->has('title_cs') ? 'is-invalid' : '' }}" type="text" name="title_cs" id="title_cs" value="{{ old('title_cs', $activity->title_cs) }}" required>
                @if($errors->has('title_cs'))
                    <span class="text-danger">{{ $errors->first('title_cs') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.activity.fields.title_cs_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title_hu">{{ trans('cruds.activity.fields.title_hu') }}</label>
                <input class="form-control {{ $errors->has('title_hu') ? 'is-invalid' : '' }}" type="text" name="title_hu" id="title_hu" value="{{ old('title_hu', $activity->title_hu) }}" required>
                @if($errors->has('title_hu'))
                    <span class="text-danger">{{ $errors->first('title_hu') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.activity.fields.title_hu_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title_sl">{{ trans('cruds.activity.fields.title_sl') }}</label>
                <input class="form-control {{ $errors->has('title_sl') ? 'is-invalid' : '' }}" type="text" name="title_sl" id="title_sl" value="{{ old('title_sl', $activity->title_sl) }}" required>
                @if($errors->has('title_sl'))
                    <span class="text-danger">{{ $errors->first('title_sl') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.activity.fields.title_sl_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="slug_sk">{{ trans('cruds.activity.fields.slug_sk') }}</label>
                <input class="form-control {{ $errors->has('slug_sk') ? 'is-invalid' : '' }}" type="text" name="slug_sk" id="slug_sk" value="{{ old('slug_sk', $activity->slug_sk) }}" required>
                @if($errors->has('slug_sk'))
                    <span class="text-danger">{{ $errors->first('slug_sk') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.activity.fields.slug_sk_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="slug_de">{{ trans('cruds.activity.fields.slug_de') }}</label>
                <input class="form-control {{ $errors->has('slug_de') ? 'is-invalid' : '' }}" type="text" name="slug_de" id="slug_de" value="{{ old('slug_de', $activity->slug_de) }}" required>
                @if($errors->has('slug_de'))
                    <span class="text-danger">{{ $errors->first('slug_de') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.activity.fields.slug_de_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="slug_cs">{{ trans('cruds.activity.fields.slug_cs') }}</label>
                <input class="form-control {{ $errors->has('slug_cs') ? 'is-invalid' : '' }}" type="text" name="slug_cs" id="slug_cs" value="{{ old('slug_cs', $activity->slug_cs) }}" required>
                @if($errors->has('slug_cs'))
                    <span class="text-danger">{{ $errors->first('slug_cs') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.activity.fields.slug_cs_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="slug_hu">{{ trans('cruds.activity.fields.slug_hu') }}</label>
                <input class="form-control {{ $errors->has('slug_hu') ? 'is-invalid' : '' }}" type="text" name="slug_hu" id="slug_hu" value="{{ old('slug_hu', $activity->slug_hu) }}" required>
                @if($errors->has('slug_hu'))
                    <span class="text-danger">{{ $errors->first('slug_hu') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.activity.fields.slug_hu_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="slug_sl">{{ trans('cruds.activity.fields.slug_sl') }}</label>
                <input class="form-control {{ $errors->has('slug_sl') ? 'is-invalid' : '' }}" type="text" name="slug_sl" id="slug_sl" value="{{ old('slug_sl', $activity->slug_sl) }}" required>
                @if($errors->has('slug_sl'))
                    <span class="text-danger">{{ $errors->first('slug_sl') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.activity.fields.slug_sl_helper') }}</span>
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
    var uploadedCoverImgMap = {}
Dropzone.options.coverImgDropzone = {
    url: '{{ route('admin.activities.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
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
      $('form').append('<input type="hidden" name="cover_img[]" value="' + response.name + '">')
      uploadedCoverImgMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedCoverImgMap[file.name]
      }
      $('form').find('input[name="cover_img[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($activity) && $activity->cover_img)
      var files = {!! json_encode($activity->cover_img) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="cover_img[]" value="' + file.file_name + '">')
        }
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