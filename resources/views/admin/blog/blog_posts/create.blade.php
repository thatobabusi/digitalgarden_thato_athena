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

    <div class="card">

        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.blogPost.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.blog.store") }}" enctype="multipart/form-data">
                @method('post')
                @csrf

                @include('admin.image._upload_form')

                @include('admin.blog.blog_posts._create_form')

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

    <script>
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
