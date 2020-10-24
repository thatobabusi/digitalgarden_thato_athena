{{--<div class="sidebar-widget">
    <div class="about-widget">
        <div class="about-image">
            <img src="{{ URL::asset('frontend_theme/basix/images/about.jpg') }}" alt="">
        </div><!-- / about-image -->
        <h6>ABOUT AUTHOR</h6>
        <p>
            Aenean sit amet tristique risus. In consequat, arcu ac venenatis eleifend,
            velit ligula sollicitudin lacus quis.
        </p>
    </div>
    <!-- / about-widget -->
</div>
<!-- / sidebar-widget -->--}}

@if(plugin_is_enabled('Blog Search'))
    <!-- search widget -->
    @include('system_layouts.frontend.components.sidebar.search')
    <!-- end search widget -->
@endif

@if(plugin_is_enabled('Blog Recommended'))
    <!-- widget recommended -->
    @include('system_layouts.frontend.components.sidebar.recommended')
    <!-- end recommended widget -->
@endif

@if(plugin_is_enabled('Blog Categories'))
    <!-- widget categories -->
    @include('system_layouts.frontend.components.sidebar.categories')
    <!-- end categories widget -->
@endif

@if(plugin_is_enabled('Blog Archives'))
    <!-- widget tags -->
    @include('system_layouts.frontend.components.sidebar.archives')
    <!-- end tags widget -->
@endif

@if(plugin_is_enabled('Blog Tags'))
    <!-- widget tags -->
    @include('system_layouts.frontend.components.sidebar.tags')
    <!-- end tags widget -->
@endif

@if(plugin_is_enabled('Twitter Feed Plugin'))
    <!-- widget twitter feed-->
    @include('system_layouts.frontend.components.sidebar.twitter')
    <!-- end twitter feed widget -->
@endif

{{--@if(plugin_is_enabled('Instagram Feed Plugin'))
    <!-- widget twitter feed-->
    @include('partials.frontend.sidebar.instagram')
    <!-- end twitter feed widget -->
@endif--}}

<div class="sidebar-widget p-0">
    <div class="ad-widget">
        <a href="#x">
            <img src="{{ URL::asset('frontend_theme/basix/images/ad.jpg') }}" alt="">
        </a>
    </div><!-- / ad-widget -->
</div><!-- / sidebar-widget -->

{{--<div class="sidebar-widget">
    <h6 class="widget-title mb-3">ADS</h6>
    <br/>

    <a href="https://www.facebook.com/SoulDesignAgency/" target="_blank">
    <img src="{{URL::asset(random_pic())}}"
         class="img-responsive col-md-12" alt="Advertisement" />
    </a>
</div>--}}
