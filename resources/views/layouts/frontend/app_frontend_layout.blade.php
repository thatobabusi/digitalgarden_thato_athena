<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- CSRF TOKEN -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- META BASIC -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {!! Meta::tag('viewport') !!}

    {!! Meta::tag('title', Meta::get('title')  ) !!}

    <!-- META DETAILED -->
    {!! Meta::tag('robots') !!}
    {!! Meta::tag('site_name', config('app.name', 'Laravel')) !!}
    {!! Meta::tag('url', Request::url()); !!}
    {!! Meta::tag('locale', str_replace('_', '-', app()->getLocale()) ) !!}
    {!! Meta::tag('author', config('app.app_developer_name') ) !!}
    {!! Meta::tag('keywords') !!}
    {!! Meta::tag('description') !!}
    {!! Meta::tag('image', asset('images/img.jpg')) !!}

<!-- FAV ICONS -->
@include('partials.frontend.app.app_favicons')

<!-- BOOTSTRAP 4 CORE CSS -->
@include('partials.frontend.app.app_core_styles')

<!-- THEME CSS -->
@include('partials.frontend.app.app_theme_styles')

<!-- FONTS -->
@include('partials.frontend.app.app_fonts')

</head>

<body class="has-fixed-menu">

<div id="preloader">
    <div class="preloader" style="width: 200px !important;">
        <span></span>
        <span></span>
    </div>
</div>

<div id="top"></div>

<!-- NAVBAR -->
@include('layouts.frontend.menu')
<!-- END NAVBAR -->

<!-- PAGE HEADER -->
@include('layouts.frontend.app_page_header')
<!-- END PAGE HEADER -->

<div class="spacer">&nbsp;</div>

<div class="container">
    <div class="row vcenter">
        <div class="col-md-12">
            @include('flash::message')
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-8 blog-content">

            @yield('content')

        </div>
        <!-- / blog-content -->

        <div class="col-lg-4 blog-sidebar">
            @include('layouts.frontend.app_frontend_sidebar')
        </div>
        <!-- / blog-sidebar -->

    </div>

    <div class="row">
        @include('partials.frontend.instagram')
        {{--@include('partials.frontend.footer_advertisements')--}}
    </div>
    <!-- / row -->

</div>
<!-- / container -->

<!-- FOOTER -->
@include('layouts.frontend.footer')
<!-- END FOOTER -->

<!-- JAVASCRIPT -->
@include('partials.frontend.app.app_core_javascripts')
@include('sweetalert::alert')

<!-- END JAVASCRIPT -->

{{--@yield('disqus_plugin')--}}

@yield('js_bottom_scripts')
</body>

</html>
