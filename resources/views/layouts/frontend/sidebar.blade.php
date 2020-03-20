<div class="col-md-4 col-lg-3">
    <div class="sidebar">

        @if(plugin_is_enabled('Blog Search'))
            <!-- search widget -->
            @include('partials.frontend.sidebar.search')
            <!-- end search widget -->
        @endif

        @if(plugin_is_enabled('Twitter Feed Plugin'))
            <!-- widget twitter feed-->
            @include('partials.frontend.sidebar.twitter')
            <!-- end twitter feed widget -->
        @endif

        @if(plugin_is_enabled('Blog Recommended'))
            <!-- widget recommended -->
            @include('partials.frontend.sidebar.recommended')
            <!-- end recommended widget -->
        @endif

        @if(plugin_is_enabled('Blog Categories'))
            <!-- widget categories -->
            @include('partials.frontend.sidebar.categories')
            <!-- end categories widget -->
        @endif

        @if(plugin_is_enabled('Blog Tags'))
            <!-- widget tags -->
            @include('partials.frontend.sidebar.tags')
            <!-- end tags widget -->
        @endif

        @if(plugin_is_enabled('Blog Archives'))
            <!-- widget tags -->
            @include('partials.frontend.sidebar.archives')
            <!-- end tags widget -->
        @endif
    </div>
</div>
