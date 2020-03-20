{{--
This is a merger of my code with 3rd party open source packages.
Trying to get it all to have the same theme
--}}

{{--@extends('layouts.backend.app_layout_backend_developer')

@section('content')--}}

@inject('helpers', 'DaveJamesMiller\MigrationsUI\Helpers')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>
            Migrations &ndash; {{ config('app.name', 'Laravel') }} - Developer Tools
        </title>

        <link rel="shortcut icon" href="{{ URL::asset('template/assets/ico/favicon.ico') }}">

        {{--This style sheet cause a conflic, dont have time to fix just comment it out--}}
        <link rel="stylesheet" href="{{ $helpers->assetUrl('app.css') }}">
        <script src="{{ $helpers->assetUrl('app.js') }}" defer></script>

    </head>
    <body class="bg-light"
        data-asset-url="{{ str_replace('FILENAME', '', route('migrations-ui.asset', 'FILENAME')) }}"
        data-app-name="{{ config('app.name', 'Laravel') . ' - Developer Tools'}}"
        data-base-url="{{ Request::getBasePath() . route('migrations-ui', [], false) }}"
        data-home-url="{{ url('/admin') }}"
    >
        <div id="app" class="loading">
            Loading...
        </div>
    </body>
</html>
{{--@endsection--}}
