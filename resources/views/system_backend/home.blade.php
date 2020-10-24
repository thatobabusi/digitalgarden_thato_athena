@extends('system_layouts.backend.app_layout_backend_admin')

@section('breadcrumbs')
    {{ Breadcrumbs::render('admin.home', \Str::title('Admin Dashboard')) }}
@endsection

@section('content')
<div class="content">

    @yield('breadcrumbs')

    <div class="row">
        @include('system_layouts.backend.partials.buttons.home_buttons')
    </div>

    <div class="row">

        @can('user_create')
            <div class="col-md-12">
            @include('system_layouts.backend.partials.buttons.blog_management_top_buttons')
            </div>
        @endcan

        @include('system_layouts.backend.partials.widgets.blog_posts')

        @include('system_layouts.backend.partials.widgets.blog_post_categories')

        @include('system_layouts.backend.partials.widgets.blog_post_tags')

    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection
