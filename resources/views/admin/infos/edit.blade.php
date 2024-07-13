@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.info.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.infos.update", [$info->id]) }}"  enctype="multipart/form-data">
            @method('PUT')
            @csrf

            {{-- Buttons --}}
            <div class="d-flex justify-content-start my-3">
            <a href="/admin/infos" class="btn btn-warning m-1" onclick="return confirm('{{ trans('global.areYouSure') }}');">
              Back
            </a>
            <button class="btn btn-danger m-1" type="submit">
                {{ trans('global.save') }}
            </button>
            </div>
      
            {{--   Cover_img --}}
            <div class="form-group">
                <label for="cover_img">{{ trans('cruds.info.fields.cover_img') }}</label>
                <div class="needsclick dropzone {{ $errors->has('cover_img') ? 'is-invalid' : '' }}" id="cover_img-dropzone">
                </div>
                @if($errors->has('cover_img'))
                    <span class="text-danger">{{ $errors->first('cover_img') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.info.fields.cover_img_helper') }}</span>
            </div>

            {{-- Tags --}}
            <div class="form-group">
                <label for="tags">{{ trans('cruds.info.fields.tags') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('tags') ? 'is-invalid' : '' }}" name="tags[]" id="tags" multiple>
                    @foreach($tags as $id => $tag)
                        <option value="{{ $id }}" {{ (in_array($id, old('tags', [])) || $info->tags->contains($id)) ? 'selected' : '' }}>{{ $tag }}</option>
                    @endforeach
                </select>
                @if($errors->has('tags'))
                    <span class="text-danger">{{ $errors->first('tags') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.info.fields.tags_helper') }}</span>
            </div>


            <div class="row">
              <div class="col-6">
                @foreach ($langs as $key => $lang)
                  <button class="example-toggle-link btn {{ $key === 0 ? 'btn-primary' : 'btn btn-outline-primary' }} btn-lg mt-5" data-target="example-{{$lang->lang}}">{{$lang->lang}}</button>
                @endforeach
              </div>
              <div class="col-6">
                @foreach ($langs as $key => $lang)
                  <button class="form-toggle-link btn {{ $key === 0 ? 'btn-primary' : 'btn btn-outline-primary' }} btn-lg mt-5" data-target="form-{{$lang->lang}}">{{$lang->lang}}</button>
                @endforeach
              </div>
            </div>
  
  
            <hr>
    
  
            {{-- TransInfo --}}

            <div class="row">
              <div class="col-6">
                @foreach ($info->originTransInfos as $key => $transInfo)

                <div id="example-{{$transInfo->lang->lang}}" class="d-{{ $key === 0 ? 'block' : 'none' }} example">
                    
                    
                    {{-- Order, title, slug --}}
                    <div class="row">
                      <div class="form-group col-2">
                        <label for="order">{{ trans('cruds.transInfo.fields.order') }}</label>
                        <input class="form-control" type="number" value="{{$transInfo->order}}" readonly>
                      </div>
                      <div class="form-group col-5">
                        <label for="title">{{ trans('cruds.transInfo.fields.title') }}</label>
                        <input class="form-control" type="text" value="{{$transInfo->title}}" readonly>
                      </div>
                      <div class="form-group col-5">
                        <label for="slug">{{ trans('cruds.transInfo.fields.slug') }}</label>
                        <input class="form-control" type="text" value="{{$transInfo->slug}}" readonly>
                      </div>
                    </div>
        
                    {{-- Subtitle, link --}}
                    <div class="row">
                      <div class="form-group col-6">
                        <label for="subtitle">{{ trans('cruds.transInfo.fields.subtitle') }}</label>
                        <input class="form-control" type="text" value="{{$transInfo->subtitle}}" readonly>
                      </div>
                      <div class="form-group col-6">
                        <label for="link">Link</label>
                        <input class="form-control" type="text" value="{{$transInfo->link}}" readonly>
                      </div>
                    </div>
                    
                    {{-- Text --}}
                    <div class="form-group">
                      <label for="text">{{ trans('cruds.transInfo.fields.text') }}</label>
                      <div class="border rounded" style="min-height: 230px">
                        <div class="bg-light rounded border-bottom" style="height: 75px"></div>
                        <div style="padding:10px;">{!!$transInfo->text!!}</div>
                      </div>
                    </div>
        
                </div>

            @endforeach
              </div>
              <div class="col-6">
                @foreach ($info->originTransInfos as $key => $transInfo)

                <div id="form-{{$transInfo->lang->lang}}" class="d-{{ $key === 0 ? 'block' : 'none' }} form">
                    <div class="form-group d-none">
                        <label class="required" for="lang_id">{{ trans('cruds.transInfo.fields.lang') }}</label>
                        <select class="form-control select2 {{ $errors->has('lang') ? 'is-invalid' : '' }}" name="transData[{{$transInfo->lang->id}}]['lang_id']" id="lang_id" required>
                            @foreach($langs as $id => $entry)
                                <option value="{{$transInfo->lang->id}}" selected>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('lang'))
                            <span class="text-danger">{{ $errors->first('lang') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.transInfo.fields.lang_helper') }}</span>
                    </div>
                    
                    {{-- Order, title, slug --}}
                    <div class="row">
                      <div class="form-group col-2">
                        <label for="order">{{ trans('cruds.transInfo.fields.order') }}</label>
                        <input class="form-control {{ $errors->has('order') ? 'is-invalid' : '' }}" type="number" value="{{$transInfo->order}}" name="transData[{{$transInfo->lang->id}}]['order']" id="order" value="{{ old('order', '') }}" step="1">
                        @if($errors->has('order'))
                            <span class="text-danger">{{ $errors->first('order') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.transInfo.fields.order_helper') }}</span>
                      </div>
                      <div class="form-group col-5">
                        <label for="title">{{ trans('cruds.transInfo.fields.title') }}</label>
                        <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" value="{{$transInfo->title}}" name="transData[{{$transInfo->lang->id}}]['title']" id="title" value="{{ old('title', '') }}">
                        @if($errors->has('title'))
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.transInfo.fields.title_helper') }}</span>
                      </div>
                      <div class="form-group col-5">
                        <label for="slug">{{ trans('cruds.transInfo.fields.slug') }}</label>
                        <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" value="{{$transInfo->slug}}" name="transData[{{$transInfo->lang->id}}]['slug']" id="slug" value="{{ old('slug', '') }}">
                        @if($errors->has('slug'))
                            <span class="text-danger">{{ $errors->first('slug') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.transInfo.fields.slug_helper') }}</span>
                      </div>
                    </div>
        
                    {{-- Subtitle, link --}}
                    <div class="row">
                      <div class="form-group col-6">
                        <label for="subtitle">{{ trans('cruds.transInfo.fields.subtitle') }}</label>
                        <input class="form-control {{ $errors->has('subtitle') ? 'is-invalid' : '' }}" type="text" value="{{$transInfo->subtitle}}" name="transData[{{$transInfo->lang->id}}]['subtitle']" id="subtitle" value="{{ old('subtitle', '') }}">
                        @if($errors->has('subtitle'))
                            <span class="text-danger">{{ $errors->first('subtitle') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.transInfo.fields.subtitle_helper') }}</span>
                      </div>
                      <div class="form-group col-6">
                        <label for="link">Link</label>
                        <input class="form-control {{ $errors->has('link') ? 'is-invalid' : '' }}" type="text" value="{{$transInfo->link}}" name="transData[{{$transInfo->lang->id}}]['link']" id="link" value="{{ old('link', '') }}">
                        @if($errors->has('link'))
                            <span class="text-danger">{{ $errors->first('link') }}</span>
                        @endif
                      </div>
                    </div>
                    
                    {{-- Text --}}
                    <div class="form-group">
                        <label for="text">{{ trans('cruds.transInfo.fields.text') }}</label>
                        <textarea class="form-control ckeditor {{ $errors->has('text') ? 'is-invalid' : '' }}" name="transData[{{$transInfo->lang->id}}]['text']" id="text">{{$transInfo->text}}</textarea>
                        @if($errors->has('text'))
                            <span class="text-danger">{{ $errors->first('text') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.transInfo.fields.text_helper') }}</span>
                    </div>
        
                </div>

            @endforeach
              </div>
            </div>
          
              {{-- Buttons --}}
              <div class="d-flex justify-content-start my-3">
                <a href="/admin/infos" class="btn btn-warning m-1" onclick="return confirm('{{ trans('global.areYouSure') }}');">
                  Back
                </a>
                <button class="btn btn-danger m-1" type="submit">
                    {{ trans('global.save') }}
                </button>
              </div>
        </form>
    </div>
</div>

{{-- Prepínanie jazykov --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    $('.form-toggle-link').on('click', function(e) {
      e.preventDefault();
      var target = $(this).data('target');

      // Show the target form
      $('#' + target).removeClass('d-none').addClass('d-block');

      // Hide the other forms
      $('.form').not('#' + target).removeClass('d-block').addClass('d-none');

      // Change class of clicked button to btn-primary
      $(this).removeClass('btn-outline-primary').addClass('btn-primary');
      
      // Change class of other buttons to btn-danger
      $('.form-toggle-link').not(this).removeClass('btn-primary').addClass('btn-outline-primary');
      
    });
  });
</script>
<script>
  $(document).ready(function() {
    $('.example-toggle-link').on('click', function(e) {
      e.preventDefault();
      var target = $(this).data('target');

      // Show the target form
      $('#' + target).removeClass('d-none').addClass('d-block');

      // Hide the other forms
      $('.example').not('#' + target).removeClass('d-block').addClass('d-none');

      // Change class of clicked button to btn-primary
      $(this).removeClass('btn-outline-primary').addClass('btn-primary');
      
      // Change class of other buttons to btn-danger
      $('.example-toggle-link').not(this).removeClass('btn-primary').addClass('btn-outline-primary');
      
    });
  });
</script>

@endsection

@section('scripts')
<script>
    var uploadedCoverImgMap = {}
Dropzone.options.coverImgDropzone = {
    url: '{{ route('admin.infos.storeMedia') }}',
    maxFilesize: 3, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 3,
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
@if(isset($info) && $info->cover_img)
      var files = {!! json_encode($info->cover_img) !!}
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
                xhr.open('POST', '{{ route('admin.infos.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $info->id ?? 0 }}');
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