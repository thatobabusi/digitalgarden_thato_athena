@extends('system_layouts.backend.app_layout_backend_admin')

@section('breadcrumbs')
    {{ Breadcrumbs::render('admin.blog-category.show', $blogPostCategory) }}
@endsection

@section('content')

    @yield('breadcrumbs')

    @include('system_backend.admin.blog.blog_post_categories._view_form')

@endsection

@section('scripts')
    <script>
        //
    </script>
@endsection
