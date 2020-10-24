@extends('system_layouts.frontend.app_frontend_layout')

{{--@section('breadcrumbs')

    @switch($page_header)

        @case('Archive Date')
        {{ Breadcrumbs::render('frontend.blog.archive', \Str::title($page_title ?? 'All')) }}
        @break

        @case('Category')
        {{ Breadcrumbs::render('frontend.blog.category', \Str::title($page_title ?? 'All')) }}
        @break

        @case('Tag')
        {{ Breadcrumbs::render('frontend.blog.tag', \Str::title($page_title ?? 'All')) }}
        @break

        @default
        {{ Breadcrumbs::render('frontend.home', \Str::title($page_header ?? 'All')) }}

    @endswitch

@endsection--}}


@section('content')

    <style>
        .mb20 { margin-bottom: 20px; }

        hgroup { padding-left: 15px; border-bottom: 1px solid #ccc; }
        hgroup h1 { font: 500 normal 1.625em "Roboto",Arial,Verdana,sans-serif; margin-top: 0; line-height: 1.15; }
        hgroup h2.lead { font: normal normal 1.125em "Roboto",Arial,Verdana,sans-serif; margin: 0; padding-bottom: 10px; }

        .search-result .thumbnail { border-radius: 0 !important; }
        .search-result:first-child { margin-top: 0 !important; }
        .search-result { margin-top: 20px; }
        .search-result .col-md-2 { border-right: 1px dotted #ccc; min-height: 140px; }
        .search-result ul { padding-left: 0 !important; list-style: none;  }
        .search-result ul li { font: 400 normal .85em "Roboto",Arial,Verdana,sans-serif;  line-height: 30px; }
        .search-result ul li i { padding-right: 5px; }
        .search-result .col-md-7 { position: relative; }
        .search-result h3 { font: 500 normal 1.375em "Roboto",Arial,Verdana,sans-serif; margin-top: 0 !important; margin-bottom: 10px !important; }
        .search-result p { font: normal normal "Roboto",Arial,Verdana,sans-serif; }
        .search-result span.plus { position: absolute; right: 0; top: 126px; }
        .search-result span.plus a { padding: 5px 5px 3px 5px; }
        .search-result span.plus a:hover { background-color: #414141; }
        .search-result span.plus a i { color: #fff !important; }
        .search-result span.border { display: block; width: 97%; margin: 0 15px; border-bottom: 1px dotted #ccc; }
    </style>

    <hgroup class="mb20">
        <h1>Search Results</h1>
        <h2 class="lead">
            <strong class="text-danger">{{count($search_results)}}</strong>
            results were found for the search for
            <strong class="text-danger">{{$search_value ?? 'no search parameters'}}</strong>
        </h2>
    </hgroup>

    <section class="col-xs-12 col-sm-12 col-md-12">

        @foreach($search_results as $blogPost)
            <article class="search-result row">
                <div class="col-xs-12 col-sm-12 col-md-3">
                    <a href="{{ route('frontend.viewBlogSinglePostBySlug', [$blogPost->slug]) }}"
                       title="View" class="thumbnail">
                        <img src="{{ URL::asset(''.$blogPost->blogPostImages->first()->src.'') }}"
                             alt="{{$blogPost->blogPostImages->first()->alt ?? 'Post Thumbnail'}}" />
                    </a>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-2">

                    <span class="small pull-right">
                        {{\Carbon\Carbon::parse($blogPost->created_at)}}
                    </span>

                    <span class="small pull-left">
                        <i class="fa fa-user"></i>
                        <a href="#x" class="author ml-1">{{$blogPost->blogPostAuthor->name}}</a>
                    </span>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-7 excerpet">
                    <h5>
                        <a href="{{ route('frontend.viewBlogSinglePostBySlug', [$blogPost->slug]) }}" title="View..">
                            {{$blogPost->title}}
                        </a>
                    </h5>
                    <p class="small">
                        {!! Str::words($blogPost->summary, 50, '...') !!}
                    </p>
                    <div>
                        <i class="glyphicon glyphicon-tags"></i>

                        <a href="/blog-category/{{$blogPost->blogPostCategory->slug}}" class="category ml-1">
                            <span class="small">
                                <i class="fa fa-tag ml-2"></i>
                                {{$blogPost->blogPostCategory->title}}
                            </span>
                        </a>

                        @foreach($blogPost->blogPostTags as $tag)
                            <a href="/blog-tag/{{$tag->slug}}" class="category ml-1">
                                <span class="small">
                                    <i class="fa fa-tag ml-2"></i>
                                    {{$tag->title}}
                                </span>
                            </a>
                        @endforeach

                    </div>
                </div>
                <span class="clearfix borda"></span>
            </article>
        @endforeach

    </section>

    @if(isset($search_value))
        <div class="col-xl-12 col-lg-12 md-12 col-md-12 col-sm-12 col-xs-12">
            <button type="button" id="load-more" name="load-more"
                    class="load-more btn btn-lg btn-primary col-xl-12 col-lg-12 md-12 col-md-12 col-sm-12 col-xs-12">
                Load More Search Results
            </button>
        </div>
        <div class="ajax-load text-center" style="display:none">
            <p>
                <img src="https://demo.itsolutionstuff.com/plugin/loader.gif">
                Loading More Search Results
            </p>
        </div>
    @else
        <div class="post-data" id="post-data" name="post-data">
            @include('system_layouts.frontend.components.blog.blog_posts_paginated')
        </div>

        <div class="col-xl-12 col-lg-12 md-12 col-md-12 col-sm-12 col-xs-12">
            <button type="button" id="load-more" name="load-more"
                    class="load-more btn btn-lg btn-primary col-xl-12 col-lg-12 md-12 col-md-12 col-sm-12 col-xs-12">
                Load More Blog Post Records
            </button>
        </div>
        <div class="ajax-load text-center" style="display:none">
            <p>
                <img src="https://demo.itsolutionstuff.com/plugin/loader.gif">
                Loading More posts
            </p>
        </div>
    @endif

@endsection


@section('js_bottom_scripts')

    <script type="text/javascript">
        //infinite scroll function
        var page = 1;

        //Load more on load more button click
        $(".load-more").click(function()
        {
            page++;
            $(".load-more").hide();
            loadMoreData(page);
        });

        //Load more function
        function loadMoreData(page)
        {
            $.ajax(
                {
                    url: '?page=' + page,
                    type: "get",
                    beforeSend: function()
                    {
                        $('#preloader').show();
                    }
                })
                .done(function(data)
                {
                    $(".load-more").show();
                    $('#preloader').hide();
                    $("#post-data").append(data.html);
                })
                .fail(function(jqXHR, ajaxOptions, thrownError)
                    {
                        console.log('server not responding...');
                    }
                );
        }

    </script>
@endsection
