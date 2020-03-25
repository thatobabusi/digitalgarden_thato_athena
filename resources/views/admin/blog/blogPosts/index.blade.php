@extends('layouts.backend.app_layout_backend_admin')

@section('content')

@can('user_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.blog.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.blogPost.title_singular') }}
            </a>
            <a class="btn btn-success" href="{{ route("admin.blog.create") }}?student">
                {{ trans('global.add') }} {{ trans('cruds.blogPost.new_title') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.blogPost.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.blogPost.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.blogPost.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.blogPost.fields.author') }}
                        </th>
                        <th>
                            {{ trans('cruds.blogPost.fields.category') }}
                        </th>
                        <th>
                            {{ trans('cruds.blogPost.fields.blog_post_status_id') }}
                        </th>
                        <th>
                            {{ trans('cruds.blogPost.fields.tags') }}
                        </th>
                        <th>
                            {{ trans('cruds.blogPost.fields.created_at') }}
                        </th>
                        <th>
                            {{ trans('cruds.blogPost.fields.updated_at') }}
                        </th>
                        <th>
                            &nbsp;Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($blogPosts as $key => $blogPost)
                        <tr data-entry-id="{{ $blogPost->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $blogPost->id ?? '' }}
                            </td>
                            <td>
                                {{ $blogPost->title ?? '' }}
                            </td>
                            <td>
                                {{ $blogPost->blogPostAuthor->name ?? '' }}
                            </td>
                            <td>
                                {{ $blogPost->blogPostCategory->title ?? '' }}
                            </td>
                            <td>
                                {{ $blogPost->blogPostStatus->title ?? '' }}
                            </td>
                            <td>
                                @foreach($blogPost->blogPostTags as $key => $item)
                                    <span class="badge badge-info">{{ $item->title }}</span>
                                @endforeach

                            </td>
                            <td>
                                {{ $blogPost->created_at ?? '' }}
                            </td>
                            <td>
                                {{ $blogPost->updated_at ?? '' }}
                            </td>
                            <td>
                                <div class="btn-group">
                                    @can('user_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.blog.show', $blogPost->slug) }}"
                                           type="button">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('user_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.blog.edit', $blogPost->slug) }}"
                                           type="button">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('user_delete')
                                        <a class="btn btn-xs btn-danger" href="#" type="button">
                                            <form action="{{ route('admin.blog.destroy', $blogPost->id) }}"
                                                  method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
                    url: "{{ route('admin.blog.massDestroy') }}",
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
