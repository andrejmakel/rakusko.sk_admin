@extends('layouts.admin')
@section('content')
@can('price_text_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.price-texts.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.priceText.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'PriceText', 'route' => 'admin.price-texts.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.priceText.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-PriceText">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.priceText.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.priceText.fields.sk') }}
                        </th>
                        <th>
                            {{ trans('cruds.priceText.fields.de') }}
                        </th>
                        <th>
                            {{ trans('cruds.priceText.fields.cs') }}
                        </th>
                        <th>
                            {{ trans('cruds.priceText.fields.hu') }}
                        </th>
                        <th>
                            {{ trans('cruds.priceText.fields.sl') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($priceTexts as $key => $priceText)
                        <tr data-entry-id="{{ $priceText->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $priceText->id ?? '' }}
                            </td>
                            <td>
                                {{ $priceText->sk ?? '' }}
                            </td>
                            <td>
                                {{ $priceText->de ?? '' }}
                            </td>
                            <td>
                                {{ $priceText->cs ?? '' }}
                            </td>
                            <td>
                                {{ $priceText->hu ?? '' }}
                            </td>
                            <td>
                                {{ $priceText->sl ?? '' }}
                            </td>
                            <td>
                                @can('price_text_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.price-texts.show', $priceText->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('price_text_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.price-texts.edit', $priceText->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('price_text_delete')
                                    <form action="{{ route('admin.price-texts.destroy', $priceText->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('price_text_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.price-texts.massDestroy') }}",
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
  let table = $('.datatable-PriceText:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection