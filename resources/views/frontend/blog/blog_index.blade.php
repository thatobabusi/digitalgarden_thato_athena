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

        {{--{{ \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('frontend.home') }}--}}

        <section class="no-padding-top">

            @if(isset($featuredBlogPost->title))

                <div class="entry-post entry-post-fullwidth">


                    <figure class="media">
                        @if(isset($featuredBlogPost->blogPostImage->blog_post_image_path))
                            <a href="{{ route('frontend.viewBlogSinglePostBySlug', [$featuredBlogPost->slug]) }}">
                                <img src="{{isset($featuredBlogPost->blogPostImage->blog_post_image_path) ?
                                URL::asset(''.$featuredBlogPost->blogPostImage->blog_post_image_path.'') : '#'
                                }}" class="img-responsive" alt="Image Thumbnail" />
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
                                {{$featuredBlogPost->summary}}
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

            <div class="row">

                @php($blogPostsCount = 0)

                @foreach($blogPosts as $blogPost)

                    @php($blogPostsCount++)

                    <div class="col-sm-6">

                        <div class="post-entry-card">

                            @if(isset($blogPost->blogPostImage->blog_post_image_path))

                                <a href="{{ route('frontend.viewBlogSinglePostBySlug', [$blogPost->slug]) }}">
                                    <img src="{{ URL::asset(''.$blogPost->blogPostImage->blog_post_image_path.'') }}"
                                         class="img-responsive" alt="Post Thumbnail">
                                </a>

                            @endif

                            <div class="post-info">
                                <h3 class="post-title">
                                    <a href="{{ route('frontend.viewBlogSinglePostBySlug', [$blogPost->slug]) }}">
                                        {{$blogPost->title}}
                                    </a>
                                </h3>

                                <p class="post-excerpt">
                                    {{$blogPost->summary}}...
                                </p>

                                <span class="post-meta">
                                    <i class="fa fa-calendar-o"></i>
                                    {{\Carbon\Carbon::parse($blogPost->created_at)}}
                                </span>

                                <a href="{{ route('frontend.viewBlogSinglePostBySlug', [$blogPost->slug]) }}" class="read-more pull-right">Read More</a>
                            </div>

                        </div>

                    </div>

                    @if($blogPostsCount % 2 === 0)
                        <div class="clearfix"></div>
                    @endif

                @endforeach

            </div>
        </section>
    </div>
@endsection
