<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <base href="{{ url('/') }}">

        <title>
            @yield('title', 'NO TITLE SET') &ndash; {{ config('app.name', 'Laravel') }} - Developer Tools
        </title>

        <link rel="shortcut icon" href="{{ URL::asset('template/assets/ico/favicon.ico') }}">

        <link rel="stylesheet" href="{{ route('route-browser.asset', 'route-browser.css') }}">
        <script src="{{ route('route-browser.asset', 'route-browser.js') }}" defer></script>

        @yield('head')

    </head>
    <body class="bg-light">

        <nav class="navbar navbar-expand-md navbar-dark bg-primary" style="background: #343a40 !important;">

            {{-- Logo --}}
            <a class="navbar-brand h1 mb-0 mr-0 pr-2" href="{{ route('route-browser.list') }}">
                <i class="fab fa-laravel fa-lg mr-2" aria-hidden="true"></i>
                <span class="sr-only">Laravel</span> Route Browser
                &ndash;
                {{ config('app.name') }} - Developer Tools
            </a>

            {{-- Mobile toggle --}}
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-content" aria-controls="navbar-content" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            {{-- Mobile container --}}
            <div class="collapse navbar-collapse" id="navbar-content">

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin') }}">Back to Application</a>
                    </li>
                </ul>

            </div>

        </nav>

        @yield('content')

        @stack('footer')

    </body>
</html>
