@extends('layouts.admin')
@section('content')


{{-- @can('trans_shop_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.trans-shops.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.transShop.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'TransShop', 'route' => 'admin.trans-shops.parseCsvImport'])
        </div>
    </div>
@endcan --}}


<div class="card">
    <div class="card-header">
        {{ trans('cruds.transShop.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-TransShop">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.transShop.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.transShop.fields.lang') }}
                        </th>
                        <th>
                            {{ trans('cruds.transShop.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.transShop.fields.origin') }}
                        </th>
                        <th>
                            {{ trans('cruds.transShop.fields.created_at') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transShops as $key => $transShop)
                        <tr data-entry-id="{{ $transShop->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $transShop->id ?? '' }}
                            </td>
                            <td>
                                {{ $transShop->lang->lang ?? '' }}
                            </td>
                            <td>
                                {{ $transShop->title ?? '' }}
                            </td>
                            <td>
                                {{ $transShop->origin->title ?? '' }}
                            </td>
                            <td>
                                {{ $transShop->created_at ?? '' }}
                            </td>
                            <td>
                                @can('trans_shop_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.trans-shops.show', $transShop->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('trans_shop_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.trans-shops.edit', $transShop->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('trans_shop_delete')
                                    <form action="{{ route('admin.trans-shops.destroy', $transShop->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('trans_shop_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.trans-shops.massDestroy') }}",
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
  let table = $('.datatable-TransShop:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection