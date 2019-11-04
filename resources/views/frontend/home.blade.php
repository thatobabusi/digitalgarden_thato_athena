@extends('layouts.frontend.app')

{{--@extends('layouts.frontend.header')--}}
@section('content')
<div class="col-md-8 col-lg-8 col-md-offset-1 col-lg-offset-1">
    <!-- latest posts -->
    <section class="no-padding-top">
        <div class="entry-post entry-post-fullwidth">
            <figure class="media">
                <a href="blog-single-post.html">
                    <img src="{{ URL::asset(''.$featuredBlogPost->blogPostImage->blog_post_image_path.'') }}" class="img-responsive" alt="Image Thumbnail" />
                </a>
            </figure>
            <div class="entry-content">
                <div class="entry-header">
                    <h2 class="entry-title">
                        <a href="blog-single.html">
                           {{$featuredBlogPost->title}}
                            {{-- Objectively Disseminate Customer Directed E-commerce--}}
                        </a>
                    </h2>
                    <div class="meta-line">
                        <span class="post-date"><i class="fa fa-calendar"></i> Jan 14, 2016</span>
                        <span class="post-comment"><i class="fa fa-comments"></i> <a href="#">35 Comments</a></span>
                    </div>
                </div>
                <div class="excerpt">
                    <p>
                        {{$featuredBlogPost->summary}}
                    </p>
                    <p class="read-more">
                        <a href="#" class="read-more">Read More</a>
                    </p>
                </div>
            </div>
        </div>


        <div class="clearfix margin-top-30 margin-bottom-30"></div>

        <div class="row">
            @php($blogPostsCount = 0)
            @foreach($blogPosts as $blogPost)
                @php($blogPostsCount++)
                <div class="col-sm-6">
                    <div class="post-entry-card">
                        <a href="#"><img src="{{ URL::asset(''.$blogPost->blogPostImage->blog_post_image_path.'') }}" class="img-responsive" alt="Post Thumbnail"></a>
                        <div class="post-info">
                            <h3 class="post-title">
                                <a href="#">
                                    {{$blogPost->title}}
                                </a>
                            </h3>
                            <p class="post-excerpt">
                                {{$blogPost->summary}}...
                            </p>
                            <span class="post-meta"><i class="fa fa-calendar-o"></i> Jan 13, 2016</span>
                            <a href="#" class="read-more pull-right">Read More</a>
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
