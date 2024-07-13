<div class="m-3">
    @can('place_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.places.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.place.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.place.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-tagsPlaces">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.place.fields.order') }}
                            </th>
                            <th>
                                {{ trans('cruds.place.fields.title') }}
                            </th>
                            <th>
                                {{ trans('cruds.place.fields.cover_img') }}
                            </th>
                            <th>
                                {{ trans('cruds.place.fields.tags') }}
                            </th>
                            <th>
                                {{ trans('cruds.place.fields.created_at') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($places as $key => $place)
                            <tr data-entry-id="{{ $place->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $place->order ?? '' }}
                                </td>
                                <td>
                                    {{ $place->title ?? '' }}
                                </td>
                                <td>
                                    @foreach($place->cover_img as $key => $media)
                                        <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                            <img src="{{ $media->getUrl('thumb') }}">
                                        </a>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($place->tags as $key => $item)
                                        <span class="badge badge-info">{{ $item->title_sk }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    {{ $place->created_at ?? '' }}
                                </td>
                                <td>
                                    @can('place_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.places.show', $place->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('place_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.places.edit', $place->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('place_delete')
                                        <form action="{{ route('admin.places.destroy', $place->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
</div>
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('place_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.places.massDestroy') }}",
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
    order: [[ 5, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-tagsPlaces:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection