@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.navi.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.navis.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="description">{{ trans('cruds.navi.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', '') }}">
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.navi.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="titel_1">{{ trans('cruds.navi.fields.titel_1') }}</label>
                <input class="form-control {{ $errors->has('titel_1') ? 'is-invalid' : '' }}" type="text" name="titel_1" id="titel_1" value="{{ old('titel_1', '') }}">
                @if($errors->has('titel_1'))
                    <span class="text-danger">{{ $errors->first('titel_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.navi.fields.titel_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="text_1">{{ trans('cruds.navi.fields.text_1') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('text_1') ? 'is-invalid' : '' }}" name="text_1" id="text_1">{!! old('text_1') !!}</textarea>
                @if($errors->has('text_1'))
                    <span class="text-danger">{{ $errors->first('text_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.navi.fields.text_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="titel_2">{{ trans('cruds.navi.fields.titel_2') }}</label>
                <input class="form-control {{ $errors->has('titel_2') ? 'is-invalid' : '' }}" type="text" name="titel_2" id="titel_2" value="{{ old('titel_2', '') }}">
                @if($errors->has('titel_2'))
                    <span class="text-danger">{{ $errors->first('titel_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.navi.fields.titel_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="text_2">{{ trans('cruds.navi.fields.text_2') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('text_2') ? 'is-invalid' : '' }}" name="text_2" id="text_2">{!! old('text_2') !!}</textarea>
                @if($errors->has('text_2'))
                    <span class="text-danger">{{ $errors->first('text_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.navi.fields.text_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="titel_3">{{ trans('cruds.navi.fields.titel_3') }}</label>
                <input class="form-control {{ $errors->has('titel_3') ? 'is-invalid' : '' }}" type="text" name="titel_3" id="titel_3" value="{{ old('titel_3', '') }}">
                @if($errors->has('titel_3'))
                    <span class="text-danger">{{ $errors->first('titel_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.navi.fields.titel_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="text_3">{{ trans('cruds.navi.fields.text_3') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('text_3') ? 'is-invalid' : '' }}" name="text_3" id="text_3">{!! old('text_3') !!}</textarea>
                @if($errors->has('text_3'))
                    <span class="text-danger">{{ $errors->first('text_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.navi.fields.text_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="titel_4">{{ trans('cruds.navi.fields.titel_4') }}</label>
                <input class="form-control {{ $errors->has('titel_4') ? 'is-invalid' : '' }}" type="text" name="titel_4" id="titel_4" value="{{ old('titel_4', '') }}">
                @if($errors->has('titel_4'))
                    <span class="text-danger">{{ $errors->first('titel_4') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.navi.fields.titel_4_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="text_4">{{ trans('cruds.navi.fields.text_4') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('text_4') ? 'is-invalid' : '' }}" name="text_4" id="text_4">{!! old('text_4') !!}</textarea>
                @if($errors->has('text_4'))
                    <span class="text-danger">{{ $errors->first('text_4') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.navi.fields.text_4_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="titel_5">{{ trans('cruds.navi.fields.titel_5') }}</label>
                <input class="form-control {{ $errors->has('titel_5') ? 'is-invalid' : '' }}" type="text" name="titel_5" id="titel_5" value="{{ old('titel_5', '') }}">
                @if($errors->has('titel_5'))
                    <span class="text-danger">{{ $errors->first('titel_5') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.navi.fields.titel_5_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="text_5">{{ trans('cruds.navi.fields.text_5') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('text_5') ? 'is-invalid' : '' }}" name="text_5" id="text_5">{!! old('text_5') !!}</textarea>
                @if($errors->has('text_5'))
                    <span class="text-danger">{{ $errors->first('text_5') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.navi.fields.text_5_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="coordinates">{{ trans('cruds.navi.fields.coordinates') }}</label>
                <input class="form-control {{ $errors->has('coordinates') ? 'is-invalid' : '' }}" type="text" name="coordinates" id="coordinates" value="{{ old('coordinates', '') }}">
                @if($errors->has('coordinates'))
                    <span class="text-danger">{{ $errors->first('coordinates') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.navi.fields.coordinates_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="zoom">{{ trans('cruds.navi.fields.zoom') }}</label>
                <input class="form-control {{ $errors->has('zoom') ? 'is-invalid' : '' }}" type="number" name="zoom" id="zoom" value="{{ old('zoom', '') }}" step="1">
                @if($errors->has('zoom'))
                    <span class="text-danger">{{ $errors->first('zoom') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.navi.fields.zoom_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.navis.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $navi->id ?? 0 }}');
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