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
<style>
    .loader,
    .loader:after {
        border-radius: 70%;
        width: 20em;
        height: 20em;
    }
    .loader {
        margin: 60px auto;
        font-size: 10px;
        position: relative;
        text-indent: -9999em;
        border-top: 1.1em solid rgba(255, 255, 255, 0.2);
        border-right: 1.1em solid rgba(255, 255, 255, 0.2);
        border-bottom: 1.1em solid rgba(255, 255, 255, 0.2);
        /*border-left: 1.1em solid #ffffff;*/
        border-left: 1.1em solid #000000;
        -webkit-transform: translateZ(0);
        -ms-transform: translateZ(0);
        transform: translateZ(0);
        -webkit-animation: load8 1.1s infinite linear;
        animation: load8 1.1s infinite linear;
    }
    @-webkit-keyframes load8 {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }
        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }
    @keyframes load8 {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }
        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }
    #loadingDiv {
        position:absolute;
        padding-top: 10% !important;
        top:0;
        left:0;
        width:100%;
        height:1000%;
        background-color:#ffffff !important;
        /*background-color:#000;*/
        z-index: 999999;
    }
</style>

    <div style="" id="loadingDiv" name="loadingDiv" class="loadingDiv">
        <span class="col-md-4 col-md-offset-4 text-center">
            <a href="https://www.facebook.com/SoulDesignAgency/" target="_blank" class="col-md-6 col-md-offset-3">
            <img src="{{URL::asset(random_pic())}}"
                 class="img-responsive col-md-12" alt="Advertisement" />
            </a>
        </span>
        <br /><br />

        <div class="clearfix"></div>
        <div class="text-center col-md-offset-4 col-md-4">
            {{--<div class="loader">Loading...</div>--}}
            <span class="fa fa-spinner fa-spin fa-5x"></span>
            <br /><br />
            @if(isset($page_header) && $page_header === 'Blog')
                Loading page content...
            @else
                Loading page {{$page_header ?? ''}} {{$page_title ?? ''}} content...
            @endif
            {{--
            <br /><br />
            @yield('what_is_loading')...
            --}}
            <br /><br />
            please wait...
        </div>
    </div>

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

    <!-- Place the script below at the bottom of the body -->

    <script>
        /*$('body').append('<div style="" id="loadingDiv"><div class="loader">Loading...</div></div>');*/
        $('body').append( $('#loadingDiv') );
        $(window).on('load', function(){
            setTimeout(removeLoader, 5000); //wait for page load PLUS 5 seconds.
        });
        function removeLoader(){
            $( "#loadingDiv" ).fadeOut(500, function() {
                // fadeOut complete. Remove the loading div
                $( "#loadingDiv" ).remove(); //makes page more lightweight
            });
        }

        $('#flash-overlay-modal').modal();

        $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    </script>
</body>

</html>
