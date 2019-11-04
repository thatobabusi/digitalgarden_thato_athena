<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- META DATA -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Responsive Website Template">
    <meta name="author" content="The Develovers">
    <!-- CORE CSS -->
    <link href="{{ URL::asset('template/assets/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('template/assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('template/assets/css/elegant-icons.css') }}" rel="stylesheet" type="text/css">
    <!-- THEME CSS -->
    <link href="{{ URL::asset('template/assets/css/main.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('template/assets/css/my-custom-styles.css') }}" rel="stylesheet" type="text/css">
    <!-- GOOGLE FONTS -->
    <link href='https://fonts.googleapis.com/css?family=Raleway:700,400,400italic,500' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lato:400,400italic,700,300,300italic' rel='stylesheet' type='text/css'>
    <!-- FAVICONS -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ URL::asset('template/assets/ico/bravana144.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ URL::asset('template/assets/ico/bravana114.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ URL::asset('template/assets/ico/bravana72.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ URL::asset('template/assets/ico/bravana57.png') }}">
    <link rel="shortcut icon" href="{{ URL::asset('template/assets/ico/favicon.ico') }}">
</head>

<body>

    <!-- WRAPPER -->
    <div id="wrapper row">
        <!-- NAVBAR -->
        @include('layouts.frontend.menu')
        <!-- END NAVBAR -->

        {{--<div class="page-header">
            <div class="container">
                <h1 class="page-title pull-left">FOOTER WITH NEWSLETTER (DARK)</h1>
                <ol class="breadcrumb link-accent">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Features</a></li>
                    <li><a href="#">Footers</a></li>
                    <li class="active">With Newsletter (Dark)</li>
                </ol>
            </div>
        </div>--}}
        <div class="page-content col-md-offset-1">
            <div class="container">
                <div class="row">

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
        <div class="back-to-top">
            <a href="#top"><i class="fa fa-chevron-up"></i></a>
        </div>
    </div>
    <!-- END WRAPPER -->



    <!-- JAVASCRIPT -->
    <script src="{{ URL::asset('template/assets/js/jquery-2.1.1.min.js') }}"></script>
    <script src="{{ URL::asset('template/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('template/assets/js/plugins/easing/jquery.easing.min.js') }}"></script>
    <script src="{{ URL::asset('template/assets/js/plugins/twitter/twitterFetcher.min.js') }}"></script>
    <script src="{{ URL::asset('template/assets/js/bravana-lite.js') }}"></script>
    <!-- END JAVASCRIPT -->
</body>

</html>
