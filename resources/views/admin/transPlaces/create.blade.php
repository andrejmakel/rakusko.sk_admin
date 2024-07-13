@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.transPlace.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.trans-places.store") }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label class="required" for="lang_id">{{ trans('cruds.transPlace.fields.lang') }}</label>
                <select class="form-control select2 {{ $errors->has('lang') ? 'is-invalid' : '' }}" name="lang_id" id="lang_id" required>
                    @foreach($langs as $id => $entry)
                        <option value="{{ $id }}" {{ old('lang_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('lang'))
                    <span class="text-danger">{{ $errors->first('lang') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transPlace.fields.lang_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="origin_id">{{ trans('cruds.transPlace.fields.origin') }}</label>
                <select class="form-control select2 {{ $errors->has('origin') ? 'is-invalid' : '' }}" name="origin_id" id="origin_id" required>
                    @foreach($origins as $id => $entry)
                        <option value="{{ $id }}" {{ old('origin_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('origin'))
                    <span class="text-danger">{{ $errors->first('origin') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transPlace.fields.origin_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="order">{{ trans('cruds.transPlace.fields.order') }}</label>
                <input class="form-control {{ $errors->has('order') ? 'is-invalid' : '' }}" type="number" name="order" id="order" value="{{ old('order', '') }}" step="1">
                @if($errors->has('order'))
                    <span class="text-danger">{{ $errors->first('order') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transPlace.fields.order_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="title">{{ trans('cruds.transPlace.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}">
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transPlace.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="subtitle">{{ trans('cruds.transPlace.fields.subtitle') }}</label>
                <input class="form-control {{ $errors->has('subtitle') ? 'is-invalid' : '' }}" type="text" name="subtitle" id="subtitle" value="{{ old('subtitle', '') }}">
                @if($errors->has('subtitle'))
                    <span class="text-danger">{{ $errors->first('subtitle') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transPlace.fields.subtitle_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="slug">{{ trans('cruds.transPlace.fields.slug') }}</label>
                <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug" id="slug" value="{{ old('slug', '') }}">
                @if($errors->has('slug'))
                    <span class="text-danger">{{ $errors->first('slug') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transPlace.fields.slug_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="excerp">{{ trans('cruds.transPlace.fields.excerp') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('excerp') ? 'is-invalid' : '' }}" name="excerp" id="excerp">{!! old('excerp') !!}</textarea>
                @if($errors->has('excerp'))
                    <span class="text-danger">{{ $errors->first('excerp') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transPlace.fields.excerp_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="text">{{ trans('cruds.transPlace.fields.text') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('text') ? 'is-invalid' : '' }}" name="text" id="text">{!! old('text') !!}</textarea>
                @if($errors->has('text'))
                    <span class="text-danger">{{ $errors->first('text') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transPlace.fields.text_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="opening_note">Opening note</label>
                <textarea class="form-control ckeditor {{ $errors->has('opening_note') ? 'is-invalid' : '' }}" name="opening_note" id="opening_note">{!! old('opening_note') !!}</textarea>
                @if($errors->has('opening_note'))
                    <span class="text-danger">{{ $errors->first('opening_note') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="price_note">Price note</label>
                <textarea class="form-control ckeditor {{ $errors->has('price_note') ? 'is-invalid' : '' }}" name="price_note" id="price_note">{!! old('price_note') !!}</textarea>
                @if($errors->has('price_note'))
                    <span class="text-danger">{{ $errors->first('price_note') }}</span>
                @endif
            </div>



            <div class="form-group">
                <label for="kontakt">Kontakt</label>
                <textarea class="form-control ckeditor {{ $errors->has('kontakt') ? 'is-invalid' : '' }}" name="kontakt" id="kontakt">{!! old('kontakt') !!}</textarea>
                @if($errors->has('kontakt'))
                    <span class="text-danger">{{ $errors->first('kontakt') }}</span>
                @endif
            </div>
            
            <div class="form-group">
                <label for="parking">{{ trans('cruds.transPlace.fields.parking') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('parking') ? 'is-invalid' : '' }}" name="parking" id="parking">{!! old('parking') !!}</textarea>
                @if($errors->has('parking'))
                    <span class="text-danger">{{ $errors->first('parking') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transPlace.fields.parking_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="info">{{ trans('cruds.transPlace.fields.info') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('info') ? 'is-invalid' : '' }}" name="info" id="info">{!! old('info') !!}</textarea>
                @if($errors->has('info'))
                    <span class="text-danger">{{ $errors->first('info') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transPlace.fields.info_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="link">Link</label>
                <input class="form-control {{ $errors->has('link') ? 'is-invalid' : '' }}" type="text" name="link" id="link" value="{{ old('link', '') }}">
                @if($errors->has('link'))
                    <span class="text-danger">{{ $errors->first('link') }}</span>
                @endif
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
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.trans-places.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $transPlace->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

 var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {

  CKEDITOR.ClassicEditor.create(allEditors[i], {
      placeholder: '',
      toolbar: {
          items: [
              'heading', '|',
              'bold', 'italic', 'underline', '|',
              'bulletedList', 'numberedList', '|',
              'outdent', 'indent', '|',
              'undo', 'redo',
              '-',
              'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
              'alignment', '|',
              'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', '|',
              'specialCharacters', 'horizontalLine', 'pageBreak', '|',
              'sourceEditing'
          ],
          shouldNotGroupWhenFull: true
      },
      link: {
          decorators:{
            isExternal:{
              mode: 'manual',
	            label: 'Open in a new tab',
	            defaultValue: true,
	            attributes: {
		            target: '_blank',
		            rel: 'noopener noreferrer'
	            }
            }
          }
        },
        extraPlugins: [SimpleUploadAdapter],
      removePlugins: ['ExportPdf','ExportWord','CKBox','CKFinder','EasyImage','Base64UploadAdapter','RealTimeCollaborativeComments','RealTimeCollaborativeTrackChanges','RealTimeCollaborativeRevisionHistory','PresenceList','Comments','TrackChanges','TrackChangesData','RevisionHistory','Pagination','WProofreader','MathType']
  });
}
});
</script>

@endsection