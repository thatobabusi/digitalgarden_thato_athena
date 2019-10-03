@extends('layouts.frontend.app')

@extends('layouts.frontend.header')

<!-- HERO SECTION -->
{{--<div class="hero-image" style="background-image: url({{ asset('hmtl_theme/hedone/assets/img/hero-image.jpg') }});">--}}
{{--<div class="hero-image" style="background-image: url(../hmtl_theme/hedone/assets/img/hero-image.jpg);">--}}
<div class="hero-image" {{--style="background-image: url(hero-image.jpg);"--}}>
    <div class="slide-wrap">
        <div class="container">
            <div class="row">
                <div class="animatedParent animateOnce">
                    {{--<div class="slider-text-top animated fadeInDown">project</div>
                    <div class="slider-text-mid animated fadeInShake delay-750">atlas</div>
                    <div class="slider-line animated fadeInUp delay-750"></div>
                    <div class="slider-text-bottom animated fadeInUp delay-1250">a digital garden concept</div>--}}

                    {{--<div class="slider-text-top animated fadeInDown">thatobabusi.co.za</div>--}}
                    <div class="slider-text-mid animated fadeInShake delay-750">coming soon...</div>
                    <div class="slider-line animated fadeInUp delay-750"></div>
                    <div class="slider-text-bottom animated fadeInUp delay-1250">this website is still currently under development...</div>
                    <a href="#about-home" class="home-move-button animated fadeInUp delay-1500"></a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ABOUT SECTION -->
{{--@include('partials.frontend.hero_section')--}}

<!-- COUNTER SECTION -->
{{--@include('partials.frontend.counter_section')--}}

<!-- OUR TEAM -->
{{--@include('partials.frontend.our_team_section')--}}

<!-- VIDEO LIGHTBOX SECTION -->
{{--@include('partials.frontend.video_lightbox_section')--}}

<!-- OUR SERVICES -->
{{--@include('partials.frontend.our_services_section')--}}

<!-- BRANDING SLIDER -->
{{--@include('partials.frontend.branding_slider_section')--}}

<!-- PROJECTS SECTION -->
{{--@include('partials.frontend.projects_section')--}}

<!-- PROGRESS SECTION -->
{{--@include('partials.frontend.progress_section')--}}

<!-- BLOG SECTION-->
{{--@include('partials.frontend.blog_section')--}}
<!-- END BLOG SECTION -->

<!-- SUBSCRIBE SECTION -->
{{--@include('partials.frontend.subscribe_section')--}}

