<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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

<body>

    @include('partials.frontend.app.app_menu_styles')

    <!-- WRAPPER -->
    <div id="wrapper row">

        <!-- NAVBAR -->
        @include('layouts.frontend.menu')
        <!-- END NAVBAR -->

        <div class="page-content col-md-offset-1">
            <div class="container">
                <div class="row">
                    @include('flash::message')
                    <!-- MAIN CONTENT -->
                    @yield('content')
                    <!-- END MAIN CONTENT -->

                    <!-- SIDEBAR CONTENT -->
                    @include('layouts.frontend.sidebar')
                    <!-- END SIDEBAR CONTENT -->
                </div>
            </div>
        </div>

        <!-- FOOTER -->
        @include('layouts.frontend.footer')
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
