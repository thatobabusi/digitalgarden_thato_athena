@extends('layouts.backend.app_layout_backend_admin')

@section('breadcrumbs')
    {{ Breadcrumbs::render('admin.blog-category.index', \Str::title('Blog Post Categories')) }}
@endsection

@section('content')

    @yield('breadcrumbs')

    @can('user_create')
        @include('partials.backend.buttons.blog_management_top_buttons')
    @endcan

    <div class="card">
        <div class="card-header">
            {{ trans('cruds.blogPostCategory.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.blogPostCategory.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.blogPostCategory.fields.title') }}
                            </th>
                            <th>
                                {{ trans('cruds.blogPostCategory.fields.slug') }}
                            </th>
                            <th>
                                {{ trans('cruds.blogPostCategory.fields.created_at') }}
                            </th>
                            <th>
                                {{ trans('cruds.blogPostCategory.fields.updated_at') }}
                            </th>
                            <th>
                                &nbsp;Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($blogPostCategories as $key => $category)
                            <tr data-entry-id="{{ $category->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $category->id ?? '' }}
                                </td>
                                <td>
                                    {{ $category->title ?? '' }}
                                </td>
                                <td>
                                    {{ $category->slug ?? '' }}
                                </td>
                                <td>
                                    {{ $category->created_at ?? '' }}
                                </td>
                                <td>
                                    {{ $category->updated_at ?? '' }}
                                </td>
                                <td>
                                    <div class="btn-group">
                                        @can('user_show')
                                            <a class="btn btn-xs btn-primary" href="{{ route('admin.blog-category.show', $category->slug) }}"
                                               type="button">
                                                {{ trans('global.view') }}
                                            </a>
                                        @endcan
                                        @can('user_edit')
                                            <a class="btn btn-xs btn-info" href="{{ route('admin.blog-category.edit', $category->slug) }}"
                                               type="button">
                                                {{ trans('global.edit') }}
                                            </a>
                                        @endcan
                                        @can('user_delete')
                                            <a class="btn btn-xs btn-danger" href="#" type="button">
                                                <form action="{{ route('admin.blog-category.destroy', $category->id) }}"
                                                      method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
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
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons);

            @can('user_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';

                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('admin.blog-category.massDestroy') }}",
                    className: 'btn-danger',
                    action: function (e, dt, node, config) {

                        var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
                            return $(entry).data('entry-id');
                        });

                        if (ids.length === 0) {
                            alert('{{ trans('global.datatables.zero_selected') }}');
                            return
                        }

                        if (confirm('{{ trans('global.areYouSure') }}')) {
                                $.ajax({
                                    headers: {
                                        'x-csrf-token': _token
                                    },
                                    method: 'POST',
                                    url: config.url,
                                    data: {
                                        ids: ids,
                                        _method: 'DELETE'
                                    }
                                })
                                .done(function () { location.reload()
                            });
                        }
                    }
                }
                dtButtons.push(deleteButton);
            @endcan

        $.extend(true, $.fn.dataTable.defaults, {
            order: [[ 1, 'desc' ]],
            pageLength: 10,
        });

        $('.datatable-User:not(.ajaxTable)').DataTable({
            buttons: dtButtons
        });

        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
        });
    })
    </script>
@endsection
