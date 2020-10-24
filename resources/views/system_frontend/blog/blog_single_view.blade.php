@extends('system_layouts.frontend.app_frontend_layout')

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

    <!-- blog post -->
    @include('system_layouts.frontend.components.blog.blog_post_single')
    <!-- end blog post -->

    <!-- tag list -->
    @include('system_layouts.frontend.components.blog.blog_post_tag_list')
    <!-- end tag list -->

    {{--<div class="spacer">&nbsp;</div>
    {!!
        Share::page( url()->current(), $blogPost->title, ['title' => 'Share this post'], '<ul>', '</ul>' )
            ->facebook()
            ->twitter()
            ->linkedin($blogPost->summary)
            ->whatsapp()
            ->telegram()
    !!}--}}

    <!-- comments legal policy -->
    @include('system_layouts.frontend.components.legal.policy_comments')
    <!-- end comments legal policy -->

    <div id="disqus_thread"></div>

    <!-- related post -->
    {{--@include('partials.frontend.blog.blog_post_related')--}}
    <!-- end related post -->

@endsection
