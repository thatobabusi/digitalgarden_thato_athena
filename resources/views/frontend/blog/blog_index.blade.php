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

    @include('partials.frontend.blog.blog_post_page_header')

    <!-- BREADCRUMBS -->
    <div class="page-header breadcrumbs-only">
        <div class="container">
            @yield('breadcrumbs')
        </div>
    </div>
    <div class="clearfix margin-top-30 margin-bottom-30"></div>
    <!-- END BREADCRUMBS -->

    <div class="col-md-9 col-lg-9 col-md-offset-0 col-lg-offset-0">

        <section class="no-padding-top">

            @include('partials.frontend.blog.blog_post_featured')

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
