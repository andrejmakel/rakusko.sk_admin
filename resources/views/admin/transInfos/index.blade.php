@extends('layouts.admin')
@section('content')


{{-- @can('trans_info_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.trans-infos.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.transInfo.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'TransInfo', 'route' => 'admin.trans-infos.parseCsvImport'])
        </div>
    </div>
@endcan --}}


<div class="card">
    <div class="card-header">
        {{ trans('cruds.transInfo.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-TransInfo">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.transInfo.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.transInfo.fields.lang') }}
                        </th>
                        <th>
                            {{ trans('cruds.transInfo.fields.title') }}
                        </th>
                        <th>
                            Origin ID
                        </th>
                        <th>
                            {{ trans('cruds.transInfo.fields.created_at') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transInfos as $key => $transInfo)
                        <tr data-entry-id="{{ $transInfo->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $transInfo->id ?? '' }}
                            </td>
                            <td>
                                {{ $transInfo->lang->lang ?? '' }}
                            </td>
                            <td>
                                {{ $transInfo->title ?? '' }}
                            </td>
                            <td>
                                {{ $transInfo->origin->id ?? '' }}
                            </td>
                            <td>
                                {{ $transInfo->created_at ?? '' }}
                            </td>
                            <td>
                                @can('trans_info_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.trans-infos.show', $transInfo->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('trans_info_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.trans-infos.edit', $transInfo->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('trans_info_delete')
                                    <form action="{{ route('admin.trans-infos.destroy', $transInfo->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('trans_info_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.trans-infos.massDestroy') }}",
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
  let table = $('.datatable-TransInfo:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection