@extends('system_layouts.backend.app_layout_backend_admin')

@section('breadcrumbs')
    {{ Breadcrumbs::render('admin.system-menu-items.index', \Str::title('Menu Manager')) }}
@endsection

@section('content')

    @yield('breadcrumbs')

   {{-- @can('user_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.users.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.user.title_singular') }}
                </a>
                <a class="btn btn-success" href="{{ route("admin.users.create") }}?student">
                    {{ trans('global.add') }} New Student
                </a>
            </div>
        </div>
    @endcan--}}

    <div class="card">
        <div class="card-header">
            {{--{{ trans('cruds.user.title_singular') }} {{ trans('global.list') }}--}}
            Menu Items List
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                    <thead>
                        <tr>
                            <th width="10">
                                {{--{{ trans('cruds.user.fields.id') }}--}}
                            </th>
                            <th>id</th>
                            <th>order</th>
                            <th>title</th>
                            <th>url_link</th>
                            <th>route</th>
                            <th>page_id</th>
                            <th>type</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($system_menu_items as $menu_item)
                            <tr data-entry-id="{{ $menu_item->id }}">
                                <td></td>
                                <td>{{ $menu_item->id ?? '' }}</td>
                                <td>{{ $menu_item->order ?? '' }}</td>
                                <td>{{ $menu_item->title ?? '' }}</td>
                                <td>{{ $menu_item->url_link ?? '' }}</td>
                                <td>{{ $menu_item->route ?? '' }}</td>
                                <td>{{ $menu_item->page_id ?? '' }}</td>
                                <td>{{ $menu_item->type ?? '' }}</td>
                            </tr>
                        @empty
                            <p>No menu items in this project :(</p>
                        @endforelse
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
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons);
@can('user_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{--{{ route('admin.users.massDestroy') }}--}}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}');

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
  dtButtons.push(deleteButton);
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'asc' ]],
    pageLength: 100,
  });

  $('.datatable-User:not(.ajaxTable)').DataTable({ buttons: dtButtons });
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
