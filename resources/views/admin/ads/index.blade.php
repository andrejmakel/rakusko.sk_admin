@extends('layouts.admin')
@section('content')
@can('ad_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.ads.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.ad.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.ad.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Ad">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.ad.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.ad.fields.order') }}
                        </th>
                        <th>
                            {{ trans('cruds.ad.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.ad.fields.cover_img') }}
                        </th>
                        <th>
                            {{ trans('cruds.ad.fields.lang') }}
                        </th>
                        <th>
                            {{ trans('cruds.ad.fields.mall') }}
                        </th>
                        <th>
                            {{ trans('cruds.ad.fields.place') }}
                        </th>
                        <th>
                            {{ trans('cruds.ad.fields.post') }}
                        </th>
                        <th>
                            {{ trans('cruds.ad.fields.info') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            
                        </td>
                        <td>
                            
                        </td>
                        <td>
                            
                        </td>
                        <td>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($langs as $key => $item)
                                    <option value="{{ $item->lang }}">{{ $item->lang }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($malls as $key => $item)
                                    <option value="{{ $item->title }}">{{ $item->title }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($places as $key => $item)
                                    <option value="{{ $item->title }}">{{ $item->originTransPlaces[0]->title }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($posts as $key => $item)
                                    <option value="{{ $item->title }}">{{ $item->originTransPosts[0]->title }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($infos as $key => $item)
                                    <option value="{{ $item->order }}">{{ $item->originTransInfos[0]->title }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ads as $key => $ad)
                        <tr data-entry-id="{{ $ad->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $ad->id ?? '' }}
                            </td>
                            <td>
                                {{ $ad->order ?? '' }}
                            </td>
                            <td>
                                {{ $ad->title ?? '' }}
                            </td>
                            <td>
                                @if($ad->cover_img)
                                    <a href="{{ $ad->cover_img->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $ad->cover_img->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $ad->lang->lang ?? '' }}
                            </td>
                            <td>
                                @foreach($ad->malls as $key => $item)
                                    <span class="badge badge-info">{{ $item->title }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($ad->places as $key => $item)
                                    <span class="badge badge-info">{{ $item->originTransPlaces[0]->title }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($ad->posts as $key => $item)
                                    <span class="badge badge-info">{{ $item->originTransPosts[0]->title }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($ad->infos as $key => $item)
                                    <span class="badge badge-info">{{ $item->originTransInfos[0]->title }}</span>
                                @endforeach
                            </td>
                            <td>
                                @can('ad_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.ads.show', $ad->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('ad_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.ads.edit', $ad->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('ad_delete')
                                    <form action="{{ route('admin.ads.destroy', $ad->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('ad_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.ads.massDestroy') }}",
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
  let table = $('.datatable-Ad:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})

</script>
@endsection