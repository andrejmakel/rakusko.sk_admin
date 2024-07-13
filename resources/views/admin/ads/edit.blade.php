@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.ad.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.ads.update", [$ad->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="order">{{ trans('cruds.ad.fields.order') }}</label>
                <input class="form-control {{ $errors->has('order') ? 'is-invalid' : '' }}" type="number" name="order" id="order" value="{{ old('order', $ad->order) }}" step="1">
                @if($errors->has('order'))
                    <span class="text-danger">{{ $errors->first('order') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ad.fields.order_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="title">{{ trans('cruds.ad.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $ad->title) }}">
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ad.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="subtitle">{{ trans('cruds.ad.fields.subtitle') }}</label>
                <input class="form-control {{ $errors->has('subtitle') ? 'is-invalid' : '' }}" type="text" name="subtitle" id="subtitle" value="{{ old('subtitle', $ad->subtitle) }}">
                @if($errors->has('subtitle'))
                    <span class="text-danger">{{ $errors->first('subtitle') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ad.fields.subtitle_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="link">{{ trans('cruds.ad.fields.link') }}</label>
                <input class="form-control {{ $errors->has('link') ? 'is-invalid' : '' }}" type="text" name="link" id="link" value="{{ old('link', $ad->link) }}">
                @if($errors->has('link'))
                    <span class="text-danger">{{ $errors->first('link') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ad.fields.link_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cover_img">{{ trans('cruds.ad.fields.cover_img') }}</label>
                <div class="needsclick dropzone {{ $errors->has('cover_img') ? 'is-invalid' : '' }}" id="cover_img-dropzone">
                </div>
                @if($errors->has('cover_img'))
                    <span class="text-danger">{{ $errors->first('cover_img') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ad.fields.cover_img_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lang_id">{{ trans('cruds.ad.fields.lang') }}</label>
                <select class="form-control select2 {{ $errors->has('lang') ? 'is-invalid' : '' }}" name="lang_id" id="lang_id">
                    @foreach($langs as $id => $entry)
                        <option value="{{ $id }}" {{ (old('lang_id') ? old('lang_id') : $ad->lang->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('lang'))
                    <span class="text-danger">{{ $errors->first('lang') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ad.fields.lang_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="malls">{{ trans('cruds.ad.fields.mall') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('malls') ? 'is-invalid' : '' }}" name="malls[]" id="malls" multiple>
                    @foreach($malls as $id => $mall)
                        <option value="{{ $id }}" {{ (in_array($id, old('malls', [])) || $ad->malls->contains($id)) ? 'selected' : '' }}>{{ $mall }}</option>
                    @endforeach
                </select>
                @if($errors->has('malls'))
                    <span class="text-danger">{{ $errors->first('malls') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ad.fields.mall_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="places">{{ trans('cruds.ad.fields.place') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('places') ? 'is-invalid' : '' }}" name="places[]" id="places" multiple>
                    @foreach($places as $id => $place)
                        <option value="{{ $id }}" {{ (in_array($id, old('places', [])) || $ad->places->contains($id)) ? 'selected' : '' }}>{{ $place }}</option>
                    @endforeach
                </select>
                @if($errors->has('places'))
                    <span class="text-danger">{{ $errors->first('places') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ad.fields.place_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="posts">{{ trans('cruds.ad.fields.post') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('posts') ? 'is-invalid' : '' }}" name="posts[]" id="posts" multiple>
                    @foreach($posts as $id => $post)
                        <option value="{{ $id }}" {{ (in_array($id, old('posts', [])) || $ad->posts->contains($id)) ? 'selected' : '' }}>{{ $post }}</option>
                    @endforeach
                </select>
                @if($errors->has('posts'))
                    <span class="text-danger">{{ $errors->first('posts') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ad.fields.post_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="infos">{{ trans('cruds.ad.fields.info') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('infos') ? 'is-invalid' : '' }}" name="infos[]" id="infos" multiple>
                    @foreach($infos as $id => $info)
                        <option value="{{ $id }}" {{ (in_array($id, old('infos', [])) || $ad->infos->contains($id)) ? 'selected' : '' }}>{{ $info }}</option>
                    @endforeach
                </select>
                @if($errors->has('infos'))
                    <span class="text-danger">{{ $errors->first('infos') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ad.fields.info_helper') }}</span>
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
    url: '{{ route('admin.ads.storeMedia') }}',
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
@if(isset($ad) && $ad->cover_img)
      var file = {!! json_encode($ad->cover_img) !!}
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
@endsection