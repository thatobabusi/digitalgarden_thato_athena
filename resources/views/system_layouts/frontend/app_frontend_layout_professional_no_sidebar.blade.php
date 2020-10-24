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

    <meta name="google-site-verification" content="{{config('app.google_site_verification', 'NA')}}" />
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="{{config('app.google_tag_manager_async_src', 'NA')}}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag("config", "{{config('app.google_tag_manager_config', 'NA')}}");
    </script>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-KQCZXBL');</script>
    <!-- End Google Tag Manager -->

    <!-- Google AdSense -->
    <script data-ad-client="{{config('app.google_adsense_client', 'NA')}}" async
            src="{{config('app.google_adsense_src', 'NA')}}"></script>
    <!-- End Google AdSense -->

    <!-- FAV ICONS -->
    @include('system_layouts.frontend.partials.app.app_favicons')

    <!-- BOOTSTRAP 4 CORE CSS -->
    @include('system_layouts.frontend.partials.app.app_core_styles')

    <!-- THEME CSS -->
    @include('system_layouts.frontend.partials.app.app_theme_styles')

    <link href="{{ URL::asset('frontend_professional/css/devresume.css') }}" id="theme-style" rel="stylesheet">
    <link href="{{ URL::asset('frontend_theme/basix/css/black.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('frontend_theme/basix/css/animate.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('frontend_theme/basix/css/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    @include('system_layouts.frontend.partials.app.app_fonts')

</head>

<body>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="{{config('app.google_tag_manager', 'NA')}}" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

    <div id="preloader">
        <div class="preloader" style="width: 200px !important;">
            <span></span>
            <span></span>
        </div>
    </div>

    <div id="top"></div>

    <div class="main-wrapper">

        @yield('content')


        <!-- JAVASCRIPT -->
        @include('system_layouts.frontend.partials.app.app_core_javascripts')
        @include('sweetalert::alert')

        <!-- END JAVASCRIPT -->


        @yield('js_bottom_scripts')
    </div>
<!--//main-wrapper-->
</body>

</html>
