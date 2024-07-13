@extends('layouts.admin')
@section('content')



<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.place.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.places.store") }}" enctype="multipart/form-data">
        @csrf


        {{-- Place --}}


          {{-- CoverImg --}}
          <div class="form-group">
            <label for="cover_img">{{ trans('cruds.place.fields.cover_img') }}</label>
            <div class="needsclick dropzone {{ $errors->has('cover_img') ? 'is-invalid' : '' }}" id="cover_img-dropzone">
            </div>
            @if($errors->has('cover_img'))
                <span class="text-danger">{{ $errors->first('cover_img') }}</span>
            @endif
            <span class="help-block">{{ trans('cruds.place.fields.cover_img_helper') }}</span>
          </div>

          {{-- Tables --}}
          <label>Tables</label>
          <div class="row pb-5">

              {{-- Opening --}}
            
              <div class="col-sm-6">
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

              {{-- Price --}}

              <div class="col-sm-6">
                <div class="border rounded shadow-sm p-2 mb-2">
                  <div id="input_fields_wrap_price" style="width: 100%">
                      <div class="row">
                          <div class="form-group col-5">
                              <label class="required" for="price_text_id">{{ trans('cruds.price.fields.price_text') }}</label>
                          </div>
                          <div class="form-group col-5">
                              <label class="required" for="price">{{ trans('cruds.price.fields.price') }}</label>
                          </div>
                      </div> 
                  </div>
                  <hr class="hr" />
                  <a href="#" id="add_field_button_price">Pridať ceny</a>
                  
                </div>
              </div>
          </div>

          
          <div class="row">

            <div class="form-group col-8">
              <label for="tags">{{ trans('cruds.place.fields.tags') }}</label>

              <select class="form-control select2 {{ $errors->has('tags') ? 'is-invalid' : '' }}" name="tags[]" id="tags" multiple style="width:100%">
                  @foreach($tags as $id => $tag)
                      <option value="{{ $id }}" {{ in_array($id, old('tags', [])) ? 'selected' : '' }}>{{ $tag }}</option>
                  @endforeach
              </select>
              <div style="padding-bottom: 4px">
                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
              </div>
              @if($errors->has('tags'))
                  <span class="text-danger">{{ $errors->first('tags') }}</span>
              @endif
              <span class="help-block">{{ trans('cruds.place.fields.tags_helper') }}</span>
            </div>

          {{-- Zip --}}
          <div class="form-group col-2">
            <label for="zip">{{ trans('cruds.place.fields.zip') }}</label>
            <input class="form-control {{ $errors->has('zip') ? 'is-invalid' : '' }}" type="number" name="zip" id="zip" value="{{ old('zip', '') }}" step="1">
            @if($errors->has('zip'))
                <span class="text-danger">{{ $errors->first('zip') }}</span>
            @endif
            <span class="help-block">{{ trans('cruds.place.fields.zip_helper') }}</span>
          </div>

          {{-- Update --}}
          <div class="form-group col-2">
            <label for="update">{{ trans('cruds.place.fields.update') }}</label>
            <input class="form-control date {{ $errors->has('update') ? 'is-invalid' : '' }}" type="text" name="update" id="update" value="{{ old('update') }}">
            @if($errors->has('update'))
                <span class="text-danger">{{ $errors->first('update') }}</span>
            @endif
            <span class="help-block">{{ trans('cruds.place.fields.update_helper') }}</span>
          </div>
          </div>
        
        @foreach ($langs as $key => $lang)

          <button class="form-toggle-link btn {{ $key === 0 ? 'btn-primary' : 'btn btn-outline-primary' }} btn-lg mt-5" data-target="form-{{$lang->lang}}">{{$lang->lang}}</button>
          
        @endforeach

        <hr>

        {{-- TransPlace --}}
        
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

            {{-- Order, title, slug --}}
            <div class="row">

              <div class="form-group col-2">
                <label for="order">{{ trans('cruds.transPlace.fields.order') }}</label>
                <input class="form-control {{ $errors->has('order') ? 'is-invalid' : '' }}" type="number" name="transData[{{$lang->id}}]['order']" id="order"  step="1">
                @if($errors->has('order'))
                    <span class="text-danger">{{ $errors->first('order') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transPlace.fields.order_helper') }}</span>
              </div>

              <div class="form-group col-5">
                <label for="title">{{ trans('cruds.transPlace.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="transData[{{$lang->id}}]['title']" id="title"  value="{{ old('title', '') }}" >
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transPlace.fields.title_helper') }}</span>
              </div>

              <div class="form-group col-5">
                <label for="slug">{{ trans('cruds.transPlace.fields.slug') }}</label>
                <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="transData[{{$lang->id}}]['slug']" id="slug" value="{{ old('slug', '') }}">
                @if($errors->has('slug'))
                    <span class="text-danger">{{ $errors->first('slug') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transPlace.fields.slug_helper') }}</span>
              </div>

            </div>

            {{-- Subtitle, link --}}
            <div class="row">

              <div class="form-group col-6">
                <label for="subtitle">{{ trans('cruds.transPlace.fields.subtitle') }}</label>
                <input class="form-control {{ $errors->has('subtitle') ? 'is-invalid' : '' }}" type="text" name="transData[{{$lang->id}}]['subtitle']" id="subtitle" value="{{ old('subtitle', '') }}">
                @if($errors->has('subtitle'))
                    <span class="text-danger">{{ $errors->first('subtitle') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transPlace.fields.subtitle_helper') }}</span>
              </div>

              <div class="form-group col-6">
                <label for="link">Link</label>
                <input class="form-control {{ $errors->has('link') ? 'is-invalid' : '' }}" type="text" name="transData[{{$lang->id}}]['link']" id="link" value="{{ old('link', '') }}">
                @if($errors->has('link'))
                    <span class="text-danger">{{ $errors->first('link') }}</span>
                @endif
              </div>

            </div>

            {{-- Text, excerp --}}
            <div class="row">

              <div class="form-group col-6">
                <label for="excerp">{{ trans('cruds.transPlace.fields.excerp') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('excerp') ? 'is-invalid' : '' }}" name="transData[{{$lang->id}}]['excerp']" id="excerp">{!! old('excerp') !!}</textarea>
                @if($errors->has('excerp'))
                    <span class="text-danger">{{ $errors->first('excerp') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transPlace.fields.excerp_helper') }}</span>
              </div>

              <div class="form-group col-6">
                <label for="text">{{ trans('cruds.transPlace.fields.text') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('text') ? 'is-invalid' : '' }}" name="transData[{{$lang->id}}]['text']" id="text">{!! old('text') !!}</textarea>
                @if($errors->has('text'))
                    <span class="text-danger">{{ $errors->first('text') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transPlace.fields.text_helper') }}</span>
              </div>

            </div>

            {{-- Opening, price note --}}
            <div class="row">

              <div class="form-group col-6">
                <label for="opening_note">Opening note</label>
                <textarea class="form-control ckeditor {{ $errors->has('opening_note') ? 'is-invalid' : '' }}" name="transData[{{$lang->id}}]['opening_note']" id="opening_note">{!! old('opening_note') !!}</textarea>
                @if($errors->has('opening_note'))
                    <span class="text-danger">{{ $errors->first('opening_note') }}</span>
                @endif
              </div>

              <div class="form-group col-6">
                <label for="price_note">Price note</label>
                <textarea class="form-control ckeditor {{ $errors->has('price_note') ? 'is-invalid' : '' }}" name="transData[{{$lang->id}}]['price_note']" id="price_note[{{$key}}]">{!! old('price_note') !!}</textarea>
                @if($errors->has('price_note'))
                    <span class="text-danger">{{ $errors->first('price_note') }}</span>
                @endif
              </div>

            </div>

            {{-- Kontakt, parking, info --}}
            <div class="row">

              <div class="form-group col-4">
                <label for="kontakt">Kontakt</label>
                <textarea class="form-control ckeditor {{ $errors->has('kontakt') ? 'is-invalid' : '' }}" name="transData[{{$lang->id}}]['kontakt']" id="kontakt">{!! old('kontakt') !!}</textarea>
                @if($errors->has('kontakt'))
                    <span class="text-danger">{{ $errors->first('kontakt') }}</span>
                @endif
              </div>
            
              <div class="form-group col-4">
                <label for="parking">{{ trans('cruds.transPlace.fields.parking') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('parking') ? 'is-invalid' : '' }}" name="transData[{{$lang->id}}]['parking']" id="parking">{!! old('parking') !!}</textarea>
                @if($errors->has('parking'))
                    <span class="text-danger">{{ $errors->first('parking') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transPlace.fields.parking_helper') }}</span>
              </div>

              <div class="form-group col-4">
                <label for="info">{{ trans('cruds.transPlace.fields.info') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('info') ? 'is-invalid' : '' }}" name="transData[{{$lang->id}}]['info']" id="info">{!! old('info') !!}</textarea>
                @if($errors->has('info'))
                    <span class="text-danger">{{ $errors->first('info') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transPlace.fields.info_helper') }}</span>
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
    var uploadedCoverImgMap = {}
Dropzone.options.coverImgDropzone = {
    url: '{{ route('admin.places.storeMedia') }}',
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
@if(isset($place) && $place->cover_img)
      var files = {!! json_encode($place->cover_img) !!}
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
                xhr.open('POST', '{{ route('admin.places.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $place->id ?? 0 }}');
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

{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>  --}}
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



<script>
    $(document).ready(function() {
      var max_fields = 10; // maximum number of fields
      var wrapper = $("#input_fields_wrap_price"); // div to hold dynamic fields
      var add_button = $("#add_field_button_price"); // button to add more fields
      var x = 0; // initial number of fields

      // add field button clicked
      $(add_button).click(function(e) {
        e.preventDefault();
        if (x < max_fields) {
            x++; // increment field counter
            $(wrapper).append(' <div class="row"><div class="form-group col-5"><select class="form-control select2Tags {{ $errors->has("price_text") ? "is-invalid" : "" }}" name="price_data['+x+'][text]" id="price_text_id" required>@foreach($price_texts as $id => $entry)<option value="{{ $id }}" {{ old("price_text_id") == $id ? "selected" : "" }}>{{ $entry }}</option>@endforeach</select>@if($errors->has("price_text"))<span class="text-danger">{{ $errors->first("price_text") }}</span>@endif<span class="help-block">{{ trans("cruds.price.fields.price_text_helper") }}</span></div><div class="form-group col-5"><input class="form-control {{ $errors->has("price") ? "is-invalid" : "" }}" type="text" name="price_data['+x+'][price]" id="price" value="{{ old("price", "") }}" required>@if($errors->has("price"))<span class="text-danger">{{ $errors->first("price") }}</span>@endif<span class="help-block">{{ trans("cruds.price.fields.price_helper") }}</span></div><div class="col text-center remove_field"><button type="button" class="btn btn-danger">X</button></div></div>'); // add input field and remove link
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




