@extends('layouts.backend.app_layout_backend_admin')

@section('content')

@can('user_create')
    @include('partials.backend.buttons.blog_management_top_buttons')
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.blogPostTag.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.blogPostTag.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.blogPostTag.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.blogPostTag.fields.slug') }}
                        </th>
                        <th>
                            {{ trans('cruds.blogPostTag.fields.created_at') }}
                        </th>
                        <th>
                            {{ trans('cruds.blogPostTag.fields.updated_at') }}
                        </th>
                        <th>
                            &nbsp;Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($blogPostTags as $key => $tag)
                        <tr data-entry-id="{{ $tag->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $tag->id ?? '' }}
                            </td>
                            <td>
                                {{ $tag->title ?? '' }}
                            </td>
                            <td>
                                {{ $tag->slug ?? '' }}
                            </td>
                            <td>
                                {{ $tag->created_at ?? '' }}
                            </td>
                            <td>
                                {{ $tag->updated_at ?? '' }}
                            </td>
                            <td>
                                <div class="btn-group">
                                    @can('user_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.blog-tag.show', $tag->slug) }}"
                                           type="button">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('user_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.blog-tag.edit', $tag->slug) }}"
                                           type="button">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('user_delete')
                                        <a class="btn btn-xs btn-danger" href="#" type="button">
                                            <form action="{{ route('admin.blog-tag.destroy', $tag->id) }}"
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
                    url: "{{ route('admin.blog-tag.massDestroy') }}",
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
