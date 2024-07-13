@extends('layouts.admin')
@section('content')
@can('holiday_name_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.holiday-names.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.holidayName.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.holidayName.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-HolidayName">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.holidayName.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.holidayName.fields.title_sk') }}
                        </th>
                        <th>
                            {{ trans('cruds.holidayName.fields.title_cs') }}
                        </th>
                        <th>
                            {{ trans('cruds.holidayName.fields.title_de') }}
                        </th>
                        <th>
                            {{ trans('cruds.holidayName.fields.title_hu') }}
                        </th>
                        <th>
                            {{ trans('cruds.holidayName.fields.title_sl') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($holidayNames as $key => $holidayName)
                        <tr data-entry-id="{{ $holidayName->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $holidayName->id ?? '' }}
                            </td>
                            <td>
                                {{ $holidayName->title_sk ?? '' }}
                            </td>
                            <td>
                                {{ $holidayName->title_cs ?? '' }}
                            </td>
                            <td>
                                {{ $holidayName->title_de ?? '' }}
                            </td>
                            <td>
                                {{ $holidayName->title_hu ?? '' }}
                            </td>
                            <td>
                                {{ $holidayName->title_sl ?? '' }}
                            </td>
                            <td>
                                @can('holiday_name_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.holiday-names.show', $holidayName->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('holiday_name_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.holiday-names.edit', $holidayName->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('holiday_name_delete')
                                    <form action="{{ route('admin.holiday-names.destroy', $holidayName->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('holiday_name_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.holiday-names.massDestroy') }}",
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
  let table = $('.datatable-HolidayName:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection