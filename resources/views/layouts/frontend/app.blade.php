<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('html_theme/hedone/assets/img/molecule.png') }}">

    <!-- Bootstrap -->
    <link href="{{ asset('html_theme/hedone/assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link href="{{ asset('html_theme/hedone/assets/css/animations.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('html_theme/hedone/assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('html_theme/hedone/assets/css/owl.carousel.custom.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('html_theme/hedone/assets/css/hedone.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('html_theme/hedone/assets/css/colors.css') }}" rel="stylesheet" type="text/css"/>

    <!--[if lte IE 9]>
    <link href="{{ asset('html_theme/hedone/assets/css/animations-ie-fix.css') }}" rel="stylesheet" type="text/css"/>
    <![endif]-->
    <link rel="icon" href="http://fototeg.ru/favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="http://fototeg.ru/favicon.ico" type="image/x-icon"/>
</head>

<body class="royal_preloader">

<!-- PRELOADER -->
<div id="royal_preloader"></div>

<!-- TOP SCROLL -->
<div id="top-home-scroll"></div>
<a href="#top-home-scroll" class="scroll-to-top-arrow-button"></a>

<!-- AJAX LOADER -->
<div id="ajax-loader" class="loader loader-default" data-half="" data-text="Loading..."></div>

<!-- IS MOBILE HACK -->
<div id="isMobile"></div>

@yield('content')

<!-- FOOTER -->
@include('layouts.frontend.footer')

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ asset('html_theme/hedone/assets/js/jquery.js') }}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ asset('html_theme/hedone/assets/js/bootstrap.min.js') }}"></script>
<!-- PLUGINS -->
<script src="{{ asset('html_theme/hedone/assets/js/plugins.js') }}" type="text/javascript"></script>
<!-- MAIN JS -->
<script src="{{ asset('html_theme/hedone/assets/js/main.js') }}" type="text/javascript"></script>
</body>
</html>
