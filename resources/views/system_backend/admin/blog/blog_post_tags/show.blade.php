@extends('system_layouts.backend.app_layout_backend_admin')

@section('breadcrumbs')
    {{ Breadcrumbs::render('admin.blog-tag.show', $blogPostTag) }}
@endsection

@section('content')

    @yield('breadcrumbs')

@include('system_backend.admin.blog.blog_post_tags._view_form')

@endsection

@section('scripts')
    <script>
        //
    </script>
@endsection
