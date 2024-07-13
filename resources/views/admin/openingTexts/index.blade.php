@extends('layouts.admin')
@section('content')
@can('opening_text_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.opening-texts.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.openingText.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'OpeningText', 'route' => 'admin.opening-texts.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.openingText.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-OpeningText">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.openingText.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.openingText.fields.sk') }}
                        </th>
                        <th>
                            {{ trans('cruds.openingText.fields.de') }}
                        </th>
                        <th>
                            {{ trans('cruds.openingText.fields.cs') }}
                        </th>
                        <th>
                            {{ trans('cruds.openingText.fields.hu') }}
                        </th>
                        <th>
                            {{ trans('cruds.openingText.fields.sl') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($openingTexts as $key => $openingText)
                        <tr data-entry-id="{{ $openingText->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $openingText->id ?? '' }}
                            </td>
                            <td>
                                {{ $openingText->sk ?? '' }}
                            </td>
                            <td>
                                {{ $openingText->de ?? '' }}
                            </td>
                            <td>
                                {{ $openingText->cs ?? '' }}
                            </td>
                            <td>
                                {{ $openingText->hu ?? '' }}
                            </td>
                            <td>
                                {{ $openingText->sl ?? '' }}
                            </td>
                            <td>
                                @can('opening_text_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.opening-texts.show', $openingText->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('opening_text_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.opening-texts.edit', $openingText->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('opening_text_delete')
                                    <form action="{{ route('admin.opening-texts.destroy', $openingText->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('opening_text_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.opening-texts.massDestroy') }}",
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
  let table = $('.datatable-OpeningText:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection