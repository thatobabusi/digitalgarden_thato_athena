@extends('layouts.frontend.app_frontend_layout')

@section('breadcrumbs')

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

@endsection

@section('content')

    {{--@include('partials.frontend.blog.blog_post_featured')--}}

    <div class="post-data" id="post-data" name="post-data">
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
            Loading More posts
        </p>
    </div>
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
