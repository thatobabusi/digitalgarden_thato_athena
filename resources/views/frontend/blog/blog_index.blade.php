@extends('layouts.frontend.app_frontend_layout')

@section('breadcrumbs')
    {{ \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('frontend.blog.category', \Str::title($page_title ?? 'All')) }}
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

    <div class="col-md-9 col-lg-9 col-md-offset-0 col-lg-offset-0">
        <!-- latest posts -->

        <section class="no-padding-top">

            @if(isset($featuredBlogPost->title))

                <div class="entry-post entry-post-fullwidth">

                    <figure class="media">
                        @if(isset($featuredBlogPost->blogPostImages->first()->src))
                            <a href="{{ route('frontend.viewBlogSinglePostBySlug', [$featuredBlogPost->slug]) }}">
                                <img src="{{isset($featuredBlogPost->blogPostImages->first()->src) ?
                                URL::asset(''.$featuredBlogPost->blogPostImages->first()->src.'') : '#'}}"
                                     class="img-responsive col-md-12"
                                     alt="{{$featuredBlogPost->blogPostImages->first()->alt ?? 'Post Thumbnail'}}" />
                            </a>
                        @endif
                    </figure>

                    <div class="entry-content">

                        <div class="entry-header">
                            <h2 class="entry-title">
                                <a href="{{ route('frontend.viewBlogSinglePostBySlug', [$featuredBlogPost->slug]) }}">
                                    {{$featuredBlogPost->title}}
                                </a>
                            </h2>
                            <div class="meta-line">

                                <span class="post-date">
                                    <i class="fa fa-calendar"></i>
                                    {{\Carbon\Carbon::parse($featuredBlogPost->created_at)}}
                                </span>

                                <span class="post-comment">
                                    <i class="fa fa-comments"></i>
                                    <a href="#">35 Comments</a>
                                </span>

                            </div>
                        </div>

                        <div class="excerpt">
                            <p>
                                {!! $featuredBlogPost->summary !!}
                            </p>
                            <p class="read-more">
                                <a href="{{ route('frontend.viewBlogSinglePostBySlug', [$featuredBlogPost->slug]) }}"
                                   class="read-more">Read More
                                </a>
                            </p>
                        </div>

                    </div>

                </div>
            @endif


            <div class="clearfix margin-top-30 margin-bottom-30"></div>

            <div class="row" id="post-data">
                @include('partials.frontend.blog.blog_posts_paginated')
            </div>

            <div class="col-xl-12 col-lg-12 md-12 col-md-12 col-sm-12 col-xs-12">
                <button type="button" id="load-more" name="load-more"
                        class="load-more btn btn-lg btn-primary col-xl-12 col-lg-12 md-12 col-md-12 col-sm-12 col-xs-12">
                    Load More Blog Post Records
                </button>
            </div>
            <div class="ajax-load text-center" style="display:none">
                <p>
                    <img src="http://demo.itsolutionstuff.com/plugin/loader.gif">
                    Loading More post
                </p>
            </div>

        </section>
    </div>
@endsection


@section('js_bottom_scripts')

    <script type="text/javascript">
        var page = 1;
        /*TODO::Discuss with Sisko why this works only sometimes...*/
        /*$(window).scroll(function() {
            if($(window).scrollTop() + $(window).height() >= $(document).height()) {
                page++;
                loadMoreData(page);
            }
        });*/

        $(".load-more").click(function(){
            page++;
            //loadMoreData(page);
            alert("Load more was clicked. Fetching " + page);
        });

        function loadMoreData(page){
            $.ajax(
                {
                    url: "{{route('frontend.getMorePostsByAjax')}}?page=" + page,
                    type: "get",
                    beforeSend: function()
                    {
                        $('.ajax-load').show();
                    }
                })
                .done(function(data)
                {
                    if(data.html === ""){
                        $('.ajax-load').html("No more records found");
                        return;
                    }

                    $('.ajax-load').hide();
                    $("#post-data").append(data.html);

                })
                .fail(function(jqXHR, ajaxOptions, thrownError)
                {
                    // alert('server not responding...');
                });
        }
    </script>
@endsection
