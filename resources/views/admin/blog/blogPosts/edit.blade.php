@extends('layouts.backend.app_layout_backend_admin')

@section('content')

    <div class="card">

        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.blogPost.title_singular') }} : {{$blogPost->title}}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.blog.update", [$blogPost->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf

               @include('admin.blog.blogPosts._edit_form')

                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection


@section('scripts')

    <script type="text/javascript" src="{{ URL::asset('vendor/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: "textarea",
            plugins: [
                "autoresize", "advlist autolink lists charmap print preview", "searchreplace visualblocks code",
                "table contextmenu paste searchreplace preview", "image imagetools", "anchor", "link", "media",
                "visualblocks", "fullpage", "fullscreen",  "hr", "code", "emoticons", "insertdatetime", "wordcount", "imagetools"
            ],

            external_plugins: {"nanospell": "{{ URL::asset('vendor/nanospell/plugin.js') }}"},

            toolbar: "nanospell | searchreplace | preview | undo redo | styleselect | formatselect | " +
                "bold italic strikethrough forecolor backcolor| " +
                "alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | " +
                "anchor | link | image | media | visualblocks | wordcount | fullpage | fullscreen | hr | code | " +
                "emoticons | contextmenu | insertdatetime | layer | removeformat",

            height: 400,
            autoresize_min_height: 500,
            paste_data_images: true,

            statusbar:  true,

            nanospell_server: "php",
            nanospell_dictionary: "af, en, en_uk, en_us, fr, pt, pt_br, se",
            nanospell_compact_menu: false,
        });
    </script>
@endsection
