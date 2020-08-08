@extends('layouts.backend.app_layout_backend_admin')

@section('styles')
    <link href="{{ asset('css/stylesbytype/uploadstyles.css') }}" rel="stylesheet" />
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('admin.blog.create', \Str::title('Create')) }}
@endsection

@section('content')

    @yield('breadcrumbs')

    @can('user_create')
        @include('partials.backend.buttons.blog_management_top_buttons')
    @endcan

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

    {{--<script type="text/javascript" src="{{ URL::asset('vendor/tinymce/tinymce.min.js') }}"></script>--}}
    {{--<script type="text/javascript" src="{{ URL::asset('js/scriptsbytype/tinymce.js') }}"></script>--}}

    <script type="text/javascript" src="{{ URL::asset('js/scriptsbytype/imageupload.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/scriptsbytype/ckeditor.js') }}"></script>

    <script>
        CKEDITOR.replace('summary');
        CKEDITOR.replace('body');
    </script>

@endsection
