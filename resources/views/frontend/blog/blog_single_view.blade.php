@extends('layouts.frontend.app_frontend_layout')

{{--@extends('layouts.frontend.header')--}}
@section('breadcrumbs')
    {{ Breadcrumbs::render('frontend.blog.slug', \Str::title($blogPost->blogPostCategory->slug), $blogPost) }}
@endsection

@section('disqus_plugin')
    <script>
        /**
         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables
         *
         */

        var disqus_config = function () {
            this.page.url = "/blog/{{$blogPost->slug}}"; //PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
            this.page.identifier =  "/blog/{{$blogPost->slug}}";//PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
            this.page.title = "/blog/{{$blogPost->slug}}"; //'a unique title for each page where Disqus is present';
        };

        (function() { // DON'T EDIT BELOW THIS LINE
            var d = document, s = d.createElement('script');
            s.src = 'https://thatobabusi-co-za.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
    </script>

    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

    <script id="dsq-count-scr" src="//thatobabusi-co-za.disqus.com/count.js" async></script>
@endsection

@section('content')

    <!-- PAGE HEADER TITLE -->
    <div class="text-center">
        @if(isset($page_header))
            <h1>Blog Posts by {{$page_header}}</h1>
        @else
            <h1>Blog</h1>
        @endif
    </div>
    <!-- END PAGE HEADER TITLE -->

    <!-- BREADCRUMBS -->
    <div class="page-header breadcrumbs-only">
        <div class="container">
            @yield('breadcrumbs')
        </div>
    </div>
    <div class="clearfix margin-top-30 margin-bottom-30"></div>
    <!-- END BREADCRUMBS -->

    <!-- PAGE CONTENT -->
    <div class="col-md-9 col-lg-9 col-md-offset-0 col-lg-offset-0">

        <!-- blog post -->
        @include('partials.frontend.blog.blog_post_single')
        <!-- end blog post -->

        <div class="row">
            <!-- tag list -->
            @include('partials.frontend.blog.blog_post_tag_list')
            <!-- end tag list -->

            <!-- social sharing -->
            {{--@include('partials.frontend.blog.blog_post_social_share')--}}
            <!-- end social sharing -->
        </div>

        <!-- author info -->
        {{--@include('partials.frontend.blog.blog_post_author_info')--}}
        <!-- end author info -->

        @include('partials.frontend.legal.policy_comments')

        <div id="disqus_thread"></div>

        <!-- related post -->
        @include('partials.frontend.blog.blog_post_related')
        <!-- end related post -->

    </div>
    <!-- END PAGE CONTENT -->

@endsection
