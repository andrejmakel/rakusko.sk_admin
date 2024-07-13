<div class="m-3">
    @can('trans_place_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.trans-places.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.transPlace.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.transPlace.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-originTransPlaces">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.transPlace.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.transPlace.fields.lang') }}
                            </th>
                            <th>
                                {{ trans('cruds.transPlace.fields.title') }}
                            </th>
                            <th>
                                {{ trans('cruds.transPlace.fields.origin') }}
                            </th>
                            <th>
                                {{ trans('cruds.transPlace.fields.created_at') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transPlaces as $key => $transPlace)
                            <tr data-entry-id="{{ $transPlace->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $transPlace->id ?? '' }}
                                </td>
                                <td>
                                    {{ $transPlace->lang->lang ?? '' }}
                                </td>
                                <td>
                                    {{ $transPlace->title ?? '' }}
                                </td>
                                <td>
                                    {{ $transPlace->origin->title ?? '' }}
                                </td>
                                <td>
                                    {{ $transPlace->created_at ?? '' }}
                                </td>
                                <td>
                                    @can('trans_place_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.trans-places.show', $transPlace->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('trans_place_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.trans-places.edit', $transPlace->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('trans_place_delete')
                                        <form action="{{ route('admin.trans-places.destroy', $transPlace->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('trans_place_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.trans-places.massDestroy') }}",
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
  let table = $('.datatable-originTransPlaces:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection