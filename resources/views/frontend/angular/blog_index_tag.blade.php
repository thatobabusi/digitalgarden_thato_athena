@extends('layouts.frontend.app_frontend_angular_layout')

@section('angular_app_module') ng-app="blogPostRecords" @endsection

@section('angular_page_controller') ng-controller="blogPostsController" @endsection

@section('what_is_loading') Getting Blog Posts by {{$page_header ?? ''}} {{$page_title ?? ''}} @endsection

@section('breadcrumbs')

    @switch($page_header)

        @case('Archive Date')
        {{ Breadcrumbs::render('frontend.blog.archive', \Str::title($page_title ?? 'All')) }}
        @break

        @case('Category')
        {{ Breadcrumbs::render('frontend.blog.category', \Str::title($page_title ?? 'All')) }}
        @break

        @case('Tag')
        {{ Breadcrumbs::render('frontend.blog.tag', \Str::title($page_title ?? 'All')) }}
        @break

        @default
        {{ Breadcrumbs::render('frontend.home', \Str::title($page_header ?? 'All')) }}

    @endswitch

@endsection

@section('styles')
    <style>
        [ng-cloak]
        {
            display: none !important;
        }
    </style>
@endsection

@section('content')

    <app-root>

    @include('partials.frontend_angular.blog.blog_post_page_header')

    <!-- BREADCRUMBS -->
        <div class="page-header breadcrumbs-only hide-while-angular-is-loading" ng-cloak style="display:none">
            <div class="container">
                @yield('breadcrumbs')
                <input class="form-control hidden_slug"
                       type="hidden"
                       name="hidden_slug"
                       id="hidden_slug"
                       value="{{\Str::slug($page_title, '-')}}">
            </div>
        </div>

        <div class="clearfix margin-top-30 margin-bottom-30"></div>
        <!-- END BREADCRUMBS -->

        <div class="col-md-9 col-lg-9 col-md-offset-0 col-lg-offset-0">
            <!-- latest posts -->

            <section class="no-padding-top">
                @include('partials.frontend_angular.blog.blog_post_featured')

                <div class="clearfix margin-top-30 margin-bottom-30"></div>

                <div class="row" id="post-data">
                    @include('partials.frontend_angular.blog.blog_posts_paginated')
                </div>

            </section>
        </div>
    </app-root>
@endsection

@section('js_bottom_scripts')

    <!-- Load Javascript Libraries (AngularJS, JQuery, Bootstrap) -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular-animate.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular-route.min.js"></script>
    <!-- AngularJS Application Scripts -->
    <script src="{{ URL::asset('app-angularjs/app.js') }}"></script>
    <script src="{{ URL::asset('app-angularjs/components/ifLoading.directive.js') }}"></script>
    <script src="{{ URL::asset('app-angularjs/controllers/blogPostsByTag.js') }}"></script>
    <script>
        //
    </script>
@endsection
