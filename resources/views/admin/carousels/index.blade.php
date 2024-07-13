@extends('layouts.admin')
@section('content')
@can('carousel_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.carousels.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.carousel.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Carousel', 'route' => 'admin.carousels.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.carousel.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Carousel">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.carousel.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.carousel.fields.lang') }}
                        </th>
                        <th>
                            {{ trans('cruds.carousel.fields.cover_img') }}
                        </th>
                        <th>
                            {{ trans('cruds.carousel.fields.cover_img_mobile') }}
                        </th>
                        <th>
                            {{ trans('cruds.carousel.fields.title') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($langs as $key => $item)
                                    <option value="{{ $item->lang }}">{{ $item->lang }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($carousels as $key => $carousel)
                        <tr data-entry-id="{{ $carousel->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $carousel->id ?? '' }}
                            </td>
                            <td>
                                {{ $carousel->lang->lang ?? '' }}
                            </td>
                            <td>
                                @if($carousel->cover_img)
                                    <a href="{{ $carousel->cover_img->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $carousel->cover_img->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($carousel->cover_img_mobile)
                                    <a href="{{ $carousel->cover_img_mobile->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $carousel->cover_img_mobile->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $carousel->title ?? '' }}
                            </td>
                            <td>
                                @can('carousel_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.carousels.show', $carousel->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('carousel_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.carousels.edit', $carousel->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('carousel_delete')
                                    <form action="{{ route('admin.carousels.destroy', $carousel->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('carousel_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.carousels.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Carousel:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})

</script>
@endsection