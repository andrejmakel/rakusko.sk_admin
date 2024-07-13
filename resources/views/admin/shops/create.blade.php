@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.shop.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.shops.store") }}" enctype="multipart/form-data">
            @csrf

            
          <div class="row">
            {{-- Logo --}}
            <div class="form-group col-4">
              <label class="required" for="logo">{{ trans('cruds.shop.fields.logo') }}</label>
              <div class="needsclick dropzone {{ $errors->has('logo') ? 'is-invalid' : '' }}" id="logo-dropzone">
              </div>
              @if($errors->has('logo'))
                  <span class="text-danger">{{ $errors->first('logo') }}</span>
              @endif
              <span class="help-block">{{ trans('cruds.shop.fields.logo_helper') }}</span>
            </div>

             {{-- Gallery --}}

             <div class="form-group col-4">
              <label for="gallery">{{ trans('cruds.shop.fields.gallery') }}</label>
              <div class="needsclick dropzone {{ $errors->has('gallery') ? 'is-invalid' : '' }}" id="gallery-dropzone">
              </div>
              @if($errors->has('gallery'))
                  <span class="text-danger">{{ $errors->first('gallery') }}</span>
              @endif
              <span class="help-block">{{ trans('cruds.shop.fields.gallery_helper') }}</span>
          </div>

          {{-- Map Img --}}

          <div class="form-group col-4">
              <label for="map_img">{{ trans('cruds.shop.fields.map_img') }}</label>
              <div class="needsclick dropzone {{ $errors->has('map_img') ? 'is-invalid' : '' }}" id="map_img-dropzone">
              </div>
              @if($errors->has('map_img'))
                  <span class="text-danger">{{ $errors->first('map_img') }}</span>
              @endif
              <span class="help-block">{{ trans('cruds.shop.fields.map_img_helper') }}</span>
          </div>
          </div>
           

          {{-- Title, slug, category, mall_id --}}
          <div class="row">

            <div class="col-4">
              <label>Tables</label>
                <div class="border rounded shadow-sm p-2 mb-2">
                  <div id="input_fields_wrap_opening" style="width: 100%">
                      <div class="row">
                          <div class="form-group col-5">
                              <label class="required" for="open_text_id">{{ trans('cruds.opening.fields.open_text') }}</label>
                          </div>
                          <div class="form-group col-5">
                              <label class="required" for="open_hours">{{ trans('cruds.opening.fields.open_hours') }}</label>
                          </div>
                      </div> 
                  </div>
                  <hr class="hr" />
                  <a href="#" id="add_field_button_opening">Pridať otváracie hodiny</a>
                  
                </div>
            </div>
            
            <div class="col-8">

              <div class="row">

                <div class="form-group col-3">
                  <label class="required" for="title">{{ trans('cruds.shop.fields.title') }}</label>
                  <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                  @if($errors->has('title'))
                      <span class="text-danger">{{ $errors->first('title') }}</span>
                  @endif
                  <span class="help-block">{{ trans('cruds.shop.fields.title_helper') }}</span>
                </div>

                <div class="form-group col-3">
                  <label class="required" for="slug">{{ trans('cruds.shop.fields.slug') }}</label>
                  <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug" id="slug" value="{{ old('slug', '') }}" required>
                  @if($errors->has('slug'))
                      <span class="text-danger">{{ $errors->first('slug') }}</span>
                  @endif
                  <span class="help-block">{{ trans('cruds.shop.fields.slug_helper') }}</span>
                </div>

                <div class="form-group col-6">
                  <label for="categories">{{ trans('cruds.shop.fields.categories') }}</label>

                  <select class="form-control select2 {{ $errors->has('categories') ? 'is-invalid' : '' }}" name="categories[]" id="categories" multiple>
                      @foreach($categories as $id => $category)
                          <option value="{{ $id }}" {{ in_array($id, old('categories', [])) ? 'selected' : '' }}>{{ $category }}</option>
                      @endforeach
                  </select>
                  <div style="padding-top: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                  </div>
                  @if($errors->has('categories'))
                      <span class="text-danger">{{ $errors->first('categories') }}</span>
                  @endif
                  
                </div>

                <div class="form-group col-3">
                  <label for="discount">{{ trans('cruds.shop.fields.discount') }}</label>
                  <input class="form-control {{ $errors->has('discount') ? 'is-invalid' : '' }}" type="text" name="discount" id="discount" value="{{ old('discount', '') }}">
                  @if($errors->has('discount'))
                      <span class="text-danger">{{ $errors->first('discount') }}</span>
                  @endif
                  <span class="help-block">{{ trans('cruds.shop.fields.discount_helper') }}</span>
                </div>
              
                

                <div class="form-group col-3">
                  <label class="required" for="mall_id">{{ trans('cruds.shop.fields.mall') }}</label>
                  <select class="form-control select2 {{ $errors->has('mall') ? 'is-invalid' : '' }}" name="mall_id" id="mall_id" required>
                      @foreach($malls as $id => $entry)
                          <option value="{{ $id }}" {{ old('mall_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                      @endforeach
                  </select>
                  @if($errors->has('mall'))
                      <span class="text-danger">{{ $errors->first('mall') }}</span>
                  @endif
                  <span class="help-block">{{ trans('cruds.shop.fields.mall_helper') }}</span>
                </div>

                <div class="form-group col-3">
                  <label for="zip">{{ trans('cruds.shop.fields.zip') }}</label>
                  <input class="form-control {{ $errors->has('zip') ? 'is-invalid' : '' }}" type="number" name="zip" id="zip" value="{{ old('zip', '') }}" step="1">
                  @if($errors->has('zip'))
                    <span class="text-danger">{{ $errors->first('zip') }}</span>
                  @endif
                  <span class="help-block">{{ trans('cruds.shop.fields.zip_helper') }}</span>
                </div>

                <div class="form-group col-3">
                  <label for="update">{{ trans('cruds.shop.fields.update') }}</label>
                  <input class="form-control date {{ $errors->has('update') ? 'is-invalid' : '' }}" type="text" name="update" id="update" value="{{ old('update') }}">
                  @if($errors->has('update'))
                      <span class="text-danger">{{ $errors->first('update') }}</span>
                  @endif
                  <span class="help-block">{{ trans('cruds.shop.fields.update_helper') }}</span>
                </div>

              </div>
            </div>
              
      </div>
      
      
      @foreach ($langs as $key => $lang)

        <button class="form-toggle-link btn {{ $key === 0 ? 'btn-primary' : 'btn btn-outline-primary' }} btn-lg mt-5" data-target="form-{{$lang->lang}}">{{$lang->lang}}</button>
      
      @endforeach

      <hr>

      {{-- TransShop --}}
    
      @foreach ($langs as $key => $lang)
        <div id="form-{{$lang->lang}}" class="d-{{ $key === 0 ? 'block' : 'none' }} form">

          <div class="form-group d-none">
            <label class="required" for="lang_id">{{ trans('cruds.transPlace.fields.lang') }}</label>
            <select class="form-control select2 {{ $errors->has('lang') ? 'is-invalid' : '' }}" name="transData[{{$lang->id}}]['lang_id']" id="lang_id" required>
                @foreach($langs as $id => $entry)
                    <option value="{{$lang->id}}" selected>{{ $entry }}</option>
                @endforeach
            </select>
            @if($errors->has('lang'))
                <span class="text-danger">{{ $errors->first('lang') }}</span>
            @endif
            <span class="help-block">{{ trans('cruds.transPlace.fields.lang_helper') }}</span>
          </div>

          <div class="row">
            <div class="form-group col-3">
              <label for="order">{{ trans('cruds.transShop.fields.order') }}</label>
              <input class="form-control {{ $errors->has('order') ? 'is-invalid' : '' }}" type="number" name="transData[{{$lang->id}}]['order']" id="order" value="{{ old('order', '') }}" step="1">
              @if($errors->has('order'))
                  <span class="text-danger">{{ $errors->first('order') }}</span>
              @endif
              <span class="help-block">{{ trans('cruds.transShop.fields.order_helper') }}</span>
            </div>
        
            <div class="form-group col-9">
              <label for="subtitle">{{ trans('cruds.transShop.fields.subtitle') }}</label>
              <input class="form-control {{ $errors->has('subtitle') ? 'is-invalid' : '' }}" type="text" name="transData[{{$lang->id}}]['subtitle']" id="subtitle" value="{{ old('subtitle', '') }}">
              @if($errors->has('subtitle'))
                  <span class="text-danger">{{ $errors->first('subtitle') }}</span>
              @endif
              <span class="help-block">{{ trans('cruds.transShop.fields.subtitle_helper') }}</span>
            </div>
          </div>

          <div class="row">

            <div class="form-group col-6">
              <label for="text">{{ trans('cruds.transShop.fields.text') }}</label>
              <textarea class="form-control ckeditor {{ $errors->has('text') ? 'is-invalid' : '' }}" name="transData[{{$lang->id}}]['text']" id="text">{!! old('text') !!}</textarea>
              @if($errors->has('text'))
                <span class="text-danger">{{ $errors->first('text') }}</span>
              @endif
              <span class="help-block">{{ trans('cruds.transShop.fields.text_helper') }}</span>
            </div>

            <div class="form-group col-6">
              <label for="opening_note">Opening Note</label>
              <textarea class="form-control ckeditor {{ $errors->has('opening_note') ? 'is-invalid' : '' }}" name="transData[{{$lang->id}}]['opening_note']" id="opening_note">{!! old('opening_note') !!}</textarea>
              @if($errors->has('opening_note'))
                <span class="text-danger">{{ $errors->first('opening_note') }}</span>
              @endif
            </div>

          </div>

        </div>
        
        

      @endforeach
          
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
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



@endsection

@section('scripts')
<script>
    Dropzone.options.logoDropzone = {
    url: '{{ route('admin.shops.storeMedia') }}',
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
      $('form').find('input[name="logo"]').remove()
      $('form').append('<input type="hidden" name="logo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="logo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($shop) && $shop->logo)
      var file = {!! json_encode($shop->logo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="logo" value="' + file.file_name + '">')
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
                xhr.open('POST', '{{ route('admin.shops.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $shop->id ?? 0 }}');
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

<script>
    var uploadedGalleryMap = {}
Dropzone.options.galleryDropzone = {
    url: '{{ route('admin.shops.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 2000,
      height: 1000
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="gallery[]" value="' + response.name + '">')
      uploadedGalleryMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedGalleryMap[file.name]
      }
      $('form').find('input[name="gallery[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($shop) && $shop->gallery)
      var files = {!! json_encode($shop->gallery) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="gallery[]" value="' + file.file_name + '">')
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
    Dropzone.options.mapImgDropzone = {
    url: '{{ route('admin.shops.storeMedia') }}',
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
      $('form').find('input[name="map_img"]').remove()
      $('form').append('<input type="hidden" name="map_img" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="map_img"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($shop) && $shop->map_img)
      var file = {!! json_encode($shop->map_img) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="map_img" value="' + file.file_name + '">')
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
  $(document).ready(function() {
    var max_fields = 10; // maximum number of fields
    var wrapper = $("#input_fields_wrap_opening"); // div to hold dynamic fields
    var add_button = $("#add_field_button_opening"); // button to add more fields
    var x = 1; // initial number of fields

    // add field button clicked
    $(add_button).click(function(e) {
      e.preventDefault();
      if (x < max_fields) {
        x++; // increment field counter
        $(wrapper).append('<div class="row"><div class="form-group col-5"><select class="form-control select2Tags {{ $errors->has("open_text") ? "is-invalid" : "" }}" name="open_data['+x+'][text]" id="open_text_id" required>@foreach($open_texts as $id => $entry)<option value="{{ $id }}" {{ old("open_text_id") == $id ? "selected" : "" }}>{{ $entry }}</option>@endforeach</select>@if($errors->has("open_text"))<span class="text-danger">{{ $errors->first("open_text") }}</span>@endif<span class="help-block">{{ trans("cruds.opening.fields.open_text_helper") }}</span></div><div class="form-group col-5"><input class="form-control {{ $errors->has("open_hours") ? "is-invalid" : "" }}" type="text" name="open_data['+x+'][hours]" id="open_hours" value="{{ old("open_hours", "") }}" required>@if($errors->has("open_hours"))<span class="text-danger">{{ $errors->first("open_hours") }}</span>@endif<span class="help-block">{{ trans("cruds.opening.fields.open_hours_helper") }}</span></div><div class="col text-center remove_field"><button type="button" class="btn btn-danger">X</button></div></div>'); // add input field and remove link
        $(".select2Tags").select2({
          tags: true
        });
        
      }
    });

    // remove field button clicked
    $(wrapper).on("click", ".remove_field", function(e) {
      e.preventDefault();
      $(this).parent('div').remove(); // remove input field and remove link
      x--; // decrement field counter
    });
  });
</script> 


@endsection