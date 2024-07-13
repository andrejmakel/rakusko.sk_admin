@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.transShop.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.trans-shops.update", [$transShop->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
{{--             <div class="form-group">
                <label class="required" for="lang_id">{{ trans('cruds.transShop.fields.lang') }}</label>
                <select class="form-control select2 {{ $errors->has('lang') ? 'is-invalid' : '' }}" name="lang_id" id="lang_id" required>
                    @foreach($langs as $id => $entry)
                        <option value="{{ $id }}" {{ (old('lang_id') ? old('lang_id') : $transShop->lang->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('lang'))
                    <span class="text-danger">{{ $errors->first('lang') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transShop.fields.lang_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="origin_id">{{ trans('cruds.transShop.fields.origin') }}</label>
                <select class="form-control select2 {{ $errors->has('origin') ? 'is-invalid' : '' }}" name="origin_id" id="origin_id" required>
                    @foreach($origins as $id => $entry)
                        <option value="{{ $id }}" {{ (old('origin_id') ? old('origin_id') : $transShop->origin->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('origin'))
                    <span class="text-danger">{{ $errors->first('origin') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transShop.fields.origin_helper') }}</span>
            </div> --}}

            <div class="form-group">
                <label for="order">{{ trans('cruds.transShop.fields.order') }}</label>
                <input class="form-control {{ $errors->has('order') ? 'is-invalid' : '' }}" type="number" name="order" id="order" value="{{ old('order', $transShop->order) }}" step="1">
                @if($errors->has('order'))
                    <span class="text-danger">{{ $errors->first('order') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transShop.fields.order_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="title">{{ trans('cruds.transShop.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $transShop->title) }}">
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transShop.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="subtitle">{{ trans('cruds.transShop.fields.subtitle') }}</label>
                <input class="form-control {{ $errors->has('subtitle') ? 'is-invalid' : '' }}" type="text" name="subtitle" id="subtitle" value="{{ old('subtitle', $transShop->subtitle) }}">
                @if($errors->has('subtitle'))
                    <span class="text-danger">{{ $errors->first('subtitle') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transShop.fields.subtitle_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="slug">{{ trans('cruds.transShop.fields.slug') }}</label>
                <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug" id="slug" value="{{ old('slug', $transShop->slug) }}">
                @if($errors->has('slug'))
                    <span class="text-danger">{{ $errors->first('slug') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transShop.fields.slug_helper') }}</span>
            </div>
            
            <div class="form-group">
                <label for="text">{{ trans('cruds.transShop.fields.text') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('text') ? 'is-invalid' : '' }}" name="text" id="text">{!! old('text', $transShop->text) !!}</textarea>
                @if($errors->has('text'))
                    <span class="text-danger">{{ $errors->first('text') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transShop.fields.text_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="opening_note">Opening note</label>
                <textarea class="form-control ckeditor {{ $errors->has('opening_note') ? 'is-invalid' : '' }}" name="opening_note" id="opening_note">{!! old('opening_note', $transShop->opening_note) !!}</textarea>
                @if($errors->has('opening_note'))
                    <span class="text-danger">{{ $errors->first('opening_note') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="link">Link</label>
                <input class="form-control {{ $errors->has('link') ? 'is-invalid' : '' }}" type="text" name="link" id="link" value="{{ old('link', $transShop->link) }}">
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
                xhr.open('POST', '{{ route('admin.trans-shops.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $transShop->id ?? 0 }}');
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