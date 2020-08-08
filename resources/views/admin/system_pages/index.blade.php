@extends('layouts.backend.app_layout_backend_admin')

@section('breadcrumbs')
    {{ Breadcrumbs::render('admin.system-pages.index', \Str::title('Pages Manager')) }}
@endsection

@section('content')

    @yield('breadcrumbs')

    @can('user_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.system-pages.create") }}">
                    {{--{{ trans('global.add') }} {{ trans('cruds.user.title_singular') }}--}}
                    Add New Page
                </a>
                {{--<a class="btn btn-success" href="{{ route("admin.users.create") }}?student">
                    {{ trans('global.add') }} New Student
                </a>--}}
            </div>
        </div>
    @endcan

    <div class="card">
        <div class="card-header">
            {{--{{ trans('cruds.user.title_singular') }} {{ trans('global.list') }}--}}
            Pages List
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                    <thead>
                        <tr>
                            <th width="10">
                                {{--{{ trans('cruds.user.fields.id') }}--}}
                            </th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($system_pages as $system_page)
                            <tr data-entry-id="{{ $system_page->id }}">
                                <td></td>
                                <td>{{ $system_page->title ?? '' }}</td>
                                <td>{{ $system_page->slug ?? '' }}</td>
                                <td>{{ $system_page->systemPageCategory->title ?? '' }}</td>
                                <td>
                                    <div class="btn-group">
                                        @can('user_show')
                                            <a class="btn btn-xs btn-primary" href="{{ route('admin.system-pages.show', $system_page->id) }}">
                                                {{ trans('global.view') }}
                                            </a>
                                        @endcan

                                        @can('user_edit')
                                            <a class="btn btn-xs btn-info" href="{{ route('admin.system-pages.edit', $system_page->id) }}">
                                                {{ trans('global.edit') }}
                                            </a>
                                        @endcan

                                        @can('user_delete')
                                            <a class="btn btn-xs btn-danger" href="#" type="button">
                                                <form action="{{ route('admin.system-pages.destroy', $system_page->id) }}"
                                                      method="POST"
                                                      onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                                      style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            </a>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <p>No pages in this project :(</p>
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
  };
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
