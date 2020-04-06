@extends('layouts.backend.app_layout_backend_admin')

@section('styles')
    <style>
        /*
        *
        * ==========================================
        * CUSTOM UTIL CLASSES
        * ==========================================
        *
        */
        #upload {
            opacity: 0;
        }

        #upload-label {
            position: absolute;
            top: 50%;
            left: 1rem;
            transform: translateY(-50%);
        }

        .image-area {
            border: 2px dashed rgba(255, 255, 255, 0.7);
            padding: 1rem;
            position: relative;
        }

        .image-area::before {
            content: 'Uploaded image result';
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 0.8rem;
            z-index: 1;
        }

        .image-area img {
            z-index: 2;
            position: relative;
        }
    </style>
@endsection

@section('content')

@can('user_create')
    @include('partials.backend.buttons.blog_management_top_buttons')
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.image.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">

        {{--@include('admin.image._upload_form')--}}

        @include('admin.image._upload_form2')

        {{--<div class="table-responsive">
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
        </div>--}}
    </div>
</div>

@endsection

@section('scripts')
@parent
    {{--<script src="{{asset('vendor/cropperjs-dist/cropper.min.js')}}"></script>--}}
    <script>
        $(document).ready( function() {
            //
        });

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

    <script>
        /*  ==========================================
    SHOW UPLOADED IMAGE
* ========================================== */
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#imageResult')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function () {
            $('#upload').on('change', function () {
                readURL(input);
            });
        });

        /*  ==========================================
            SHOW UPLOADED IMAGE NAME
        * ========================================== */
        var input = document.getElementById( 'upload' );
        var infoArea = document.getElementById( 'upload-label' );

        input.addEventListener( 'change', showFileName );
        function showFileName( event ) {
            var input = event.srcElement;
            var fileName = input.files[0].name;
            infoArea.textContent = 'File name: ' + fileName;
        }
    </script>
@endsection
