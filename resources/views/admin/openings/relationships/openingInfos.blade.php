<div class="m-3">
    @can('info_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.infos.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.info.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.info.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-openingInfos">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.info.fields.order') }}
                            </th>
                            <th>
                                {{ trans('cruds.info.fields.title') }}
                            </th>
                            <th>
                                {{ trans('cruds.info.fields.cover_img') }}
                            </th>
                            <th>
                                {{ trans('cruds.info.fields.tags') }}
                            </th>
                            <th>
                                {{ trans('cruds.info.fields.created_at') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($infos as $key => $info)
                            <tr data-entry-id="{{ $info->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $info->order ?? '' }}
                                </td>
                                <td>
                                    {{ $info->title ?? '' }}
                                </td>
                                <td>
                                    @foreach($info->cover_img as $key => $media)
                                        <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                            <img src="{{ $media->getUrl('thumb') }}">
                                        </a>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($info->tags as $key => $item)
                                        <span class="badge badge-info">{{ $item->title_sk }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    {{ $info->created_at ?? '' }}
                                </td>
                                <td>
                                    @can('info_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.infos.show', $info->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('info_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.infos.edit', $info->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('info_delete')
                                        <form action="{{ route('admin.infos.destroy', $info->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('info_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.infos.massDestroy') }}",
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
  let table = $('.datatable-openingInfos:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection