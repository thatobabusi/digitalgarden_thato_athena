<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" @yield('angular_app_module')>
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- META DATA -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{config('app.name')}}">
    <meta name="author" content="{{config('app.app_developer_name')}}">

    <!-- CORE CSS -->
    @include('partials.frontend.app.app_core_styles')

    <!-- THEME CSS -->
    @include('partials.frontend.app.app_theme_styles')

    <!-- GOOGLE FONTS -->
    @include('partials.frontend.app.app_fonts')

    <!-- FAV ICONS -->
    @include('partials.frontend.app.app_favicons')
</head>

@yield('styles')

<body @yield('angular_page_controller') ng-cloak>

<div class="text-center text-muted" if-loading style="padding-top: 10% !important; color:black !important;">

    <span class="col-md-4 col-md-offset-4 text-center">
        <a href="https://www.facebook.com/SoulDesignAgency/" target="_blank" class="col-md-6 col-md-offset-3">
        <img src="{{URL::asset('images/advertised_brand_images/soul-design-logo.png')}}"
             class="img-responsive col-md-12" alt="Advertisement" />
        </a>
    </span>
    <br /><br />
    <div class="clearfix"></div>

    <span class="fa fa-spinner fa-spin fa-5x"></span>
    <br /><br />
    Loading page {{$page_header ?? ''}} {{$page_title ?? ''}} content...
    <br /><br />
    @yield('what_is_loading')...
    <br /><br />
    please wait...
    <br /><br />

</div>

    @include('partials.frontend.app.app_menu_styles')

    <!-- WRAPPER -->
    <div id="wrapper row ng-cloak">

        <!-- NAVBAR -->
        {{--@include('layouts.frontend.menu')--}}
        <!-- END NAVBAR -->

        <div class="page-content col-md-offset-1">
            <div class="container">
                <div class="row">
                    @include('flash::message')
                    <!-- MAIN CONTENT -->
                    @yield('content')
                    <!-- END MAIN CONTENT -->

                    <!-- SIDEBAR CONTENT -->
                    @include('layouts.frontend.sidebar_angular')
                    <!-- END SIDEBAR CONTENT -->
                </div>
            </div>
        </div>

        <!-- FOOTER -->
        {{--@include('layouts.frontend.footer')--}}
        <!-- END FOOTER -->

        <button onclick="scrollWinTop();"  title="Go to top" id="scrollToTopButton" name="scrollToTopButton"
                class="btn btn-lg btn-primary">
            <i class="fa fa-chevron-up"></i>Scroll to top
        </button>
    </div>

    <!-- END WRAPPER -->

    <!-- JAVASCRIPT -->
    @include('partials.frontend.app.app_core_javascripts')
    <!-- END JAVASCRIPT -->

    @yield('disqus_plugin')

    @yield('js_bottom_scripts')

    <script>
        $('#flash-overlay-modal').modal();

        $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    </script>
</body>

</html>
