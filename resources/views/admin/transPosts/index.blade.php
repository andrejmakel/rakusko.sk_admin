@extends('layouts.admin')
@section('content')


{{-- @can('trans_post_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.trans-posts.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.transPost.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'TransPost', 'route' => 'admin.trans-posts.parseCsvImport'])
        </div>
    </div>
@endcan --}}


<div class="card">
    <div class="card-header">
        {{ trans('cruds.transPost.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-TransPost">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.transPost.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.transPost.fields.lang') }}
                        </th>
                        <th>
                            {{ trans('cruds.transPost.fields.title') }}
                        </th>
                        <th>
                            Origin ID
                        </th>
                        <th>
                            {{ trans('cruds.transPost.fields.created_at') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transPosts as $key => $transPost)
                        <tr data-entry-id="{{ $transPost->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $transPost->id ?? '' }}
                            </td>
                            <td>
                                {{ $transPost->lang->lang ?? '' }}
                            </td>
                            <td>
                                {{ $transPost->title ?? '' }}
                            </td>
                            <td>
                                {{ $transPost->origin->id ?? '' }}
                            </td>
                            <td>
                                {{ $transPost->created_at ?? '' }}
                            </td>
                            <td>
                                @can('trans_post_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.trans-posts.show', $transPost->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('trans_post_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.trans-posts.edit', $transPost->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('trans_post_delete')
                                    <form action="{{ route('admin.trans-posts.destroy', $transPost->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('trans_post_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.trans-posts.massDestroy') }}",
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
  let table = $('.datatable-TransPost:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection