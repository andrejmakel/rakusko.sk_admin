@extends('layouts.admin')
@section('content')
@can('mall_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.malls.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.mall.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Mall', 'route' => 'admin.malls.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.mall.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Mall">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.mall.fields.order') }}
                        </th>
                        <th>
                            {{ trans('cruds.mall.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.mall.fields.cover_img') }}
                        </th>
                        <th>
                            {{ trans('cruds.mall.fields.created_at') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($malls as $key => $mall)
                        <tr data-entry-id="{{ $mall->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $mall->originTransMalls[0]->order ?? '' }}
                            </td>
                            <td>
                                <a href="{{ route('admin.malls.edit', $mall->id) }}">
                                    {{ $mall->title ?? '' }}
                                </a>
                            </td>
                            <td>
                                @foreach($mall->cover_img as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $media->getUrl('thumb') }}">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                {{ $mall->created_at ?? '' }}
                            </td>
                            <td>
                                @can('mall_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.malls.show', $mall->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

{{--                                 @can('mall_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.malls.edit', $mall->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan --}}
{{-- 
                                @can('mall_create')
                                <a class="btn btn-xs btn-success" href="malls/clone/{{$mall->id}}">
                                    Clone
                                </a>
                                @endcan --}}

                                @can('mall_delete')
                                    <form action="{{ route('admin.malls.destroy', $mall->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('mall_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.malls.massDestroy') }}",
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
    order: [[ 2, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Mall:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection