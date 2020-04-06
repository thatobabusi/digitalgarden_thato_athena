@extends('layouts.backend.app_layout_backend_admin')

@section('content')

    @include('admin.blog.blog_posts._view_form')

    <div class="card">

        <div class="card-header">
            {{ trans('global.relatedData') }}
        </div>

        <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
            <li class="nav-item">
                <a class="nav-link" href="#blog_post_author" role="tab" data-toggle="tab">
                    {{ trans('cruds.blogPost.title_singular') }} {{ trans('cruds.user.author') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#blog_post_categories" role="tab" data-toggle="tab">
                    {{ trans('cruds.blogPostCategory.title') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#blog_post_images" role="tab" data-toggle="tab">
                    {{ trans('cruds.blogPost.title_singular') }} {{ trans('cruds.image.title') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#blog_post_tags" role="tab" data-toggle="tab">
                    {{ trans('cruds.blogPostTag.title') }}
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane" role="tabpanel" id="blog_post_author">
                @includeIf('admin.users._view_form', ['user' => $blogPost->blogPostAuthor])
            </div>
            <div class="tab-pane" role="tabpanel" id="blog_post_categories">
                @includeIf('admin.blog.blog_post_categories._view_form', ['blogPostCategory' => $blogPost->blogPostCategory])
            </div>
            <div class="tab-pane" role="tabpanel" id="blog_post_images">
                @includeIf('admin.image._view_form', ['blogPostImage' => $blogPost->blogPostImages->first()])
            </div>
            <div class="tab-pane" role="tabpanel" id="blog_post_tags">
                @includeIf('admin.blog.blog_post_tags._view_list', ['blogPostTags' => $blogPost->blogPostTags])
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
