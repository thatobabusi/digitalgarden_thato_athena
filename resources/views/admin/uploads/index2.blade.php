@extends('layouts.backend.app_layout_backend_admin')

@section('styles')
    <![endif]-->
    {{--<link href="{{ asset('vendor/ckfinder/samples/css/sample.css')}}" rel="stylesheet">--}}
    <style>
        .ui-header .ui-title,
        .ui-footer .ui-title {
            font-size: 1em;
            min-height: 1.1em;
            text-align: center;
            display: block;
            margin: 0 30%;
            padding: .7em 0;
            text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
            outline: 0!important;
            color: white!important;
        }
    </style>
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('admin.home', \Str::title('File Upload Management')) }}
@endsection

@section('content')
    <div class="content">

        @yield('breadcrumbs')

        {{--<div class="row">
            @include('partials.backend.buttons.home_buttons')
        </div>--}}

        <div class="row">

            <div id="ckfinder-widget" class="col-md-12"></div>

        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('vendor/ckfinder/samples/js/sf.js') }}"></script>
    <script src="{{ asset('vendor/ckfinder/samples/js/tree-a.js') }}"></script>
    <script src="{{ asset('vendor/ckfinder/ckfinder.js') }}"></script>
    <script>
        CKFinder.widget( 'ckfinder-widget', {
            width: '100%',
            height: 450
        } );

        $('ui-title').hide();
    </script>
    <script src="//cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
@parent

@endsection
