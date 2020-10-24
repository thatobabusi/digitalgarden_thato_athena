@extends('system_layouts.frontend.app_frontend_layout_professional')

@section('content')

    <header class="header text-center">
        <div class="force-overflow">
            <h1 class="blog-name pt-lg-4 mb-0">
                <a href="#">
                    @if(isset($resume->firstname,$resume->surname))
                        {{ $resume->firstname . ' ' . $resume->surname }}
                    @else
                        {{ config('resume.full_name') }}
                    @endif
                </a>
            </h1>

            @include('system_layouts.frontend.components_prof.nav')
        </div>
        <!--//force-overflow-->
    </header>

    <div class="main-wrapper">

        @include('system_layouts.frontend.components_prof.sectionabout')

        @include('system_layouts.frontend.components_prof.sectionwhatido')

        @include('system_layouts.frontend.components_prof.sectiontestimonials')

        @include('system_layouts.frontend.components_prof.sectionprojects')

        @include('system_layouts.frontend.components_prof.sectionblog')

        @include('system_layouts.frontend.components_prof.footer')

    </div>
    <!--//main-wrapper-->

@endsection


@section('js_bottom_scripts')
    <!-- Javascript -->
    <script src="{{ URL::asset('frontend_professional/core/plugins/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ URL::asset('frontend_professional/core/plugins/popper.min.js') }}"></script>
    <script src="{{ URL::asset('frontend_professional/core/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <script src="{{ URL::asset('frontend_professional/core/plugins/tiny-slider/min/tiny-slider.js') }}"></script>
    <script src="{{ URL::asset('frontend_professional/core/js/testimonials.js') }}"></script>


    <!-- Style Switcher (REMOVE ON YOUR PRODUCTION SITE) -->
    <script src="{{ URL::asset('frontend_professional/core/js/demo/style-switcher.js') }}"></script>

    <!-- Dark Mode -->
    <script src="{{ URL::asset('frontend_professional/core/plugins/js-cookie.min.js') }}"></script>
    <script src="{{ URL::asset('frontend_professional/core/js/dark-mode.js') }}"></script>
@endsection
