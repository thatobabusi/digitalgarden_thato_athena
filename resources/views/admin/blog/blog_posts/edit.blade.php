@extends('layouts.backend.app_layout_backend_admin')

@section('styles')
    <link href="{{ asset('css/stylesbytype/uploadstyles.css') }}" rel="stylesheet" />
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('admin.blog.edit', $blogPost) }}
@endsection

@section('content')

    @yield('breadcrumbs')

    @can('user_create')
        @include('partials.backend.buttons.blog_management_top_buttons')
    @endcan

    <div class="card">

        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.blogPost.title_singular') }} : {{$blogPost->title}}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.blog.update", [$blogPost->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                @include('admin.image._upload_form')

                @include('admin.blog.blog_posts._edit_form')

                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

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
                @includeIf('admin.image._view_form', ['image' => $blogPost->blogPostImage()])
            </div>
            <div class="tab-pane" role="tabpanel" id="blog_post_tags">
                @includeIf('admin.blog.blog_post_tags._view_list', ['blogPostTags' => $blogPost->blogPostTags])
            </div>
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
