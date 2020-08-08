@foreach($blogPosts as $blogPost)

    <div class="blog block">

        @if(isset($blogPost->blogPostImages->first()->src))
            <img src="{{ URL::asset(''.$blogPost->blogPostImages->first()->src.'') }}"
                 alt="{{$blogPost->blogPostImages->first()->alt ?? 'Post Thumbnail'}}"
                 class="block-image-big">
        @endif

        <div class="post-content">
            <h5 class="mb-0">{{$blogPost->title}}</h5>
            <div class="post-meta">
                <p>
                    <i class="fa fa-user"></i>
                    <a href="#x" class="author ml-1">{{$blogPost->blogPostAuthor->name}}</a>

                    <i class="fa fa-calendar ml-2"></i>
                    <a href="#x" class="date ml-1">{{\Carbon\Carbon::parse($blogPost->created_at)}}</a>

                    <a href="/blog-category/{{$blogPost->blogPostCategory->slug}}" class="category ml-1">
                        <i class="fa fa-tag ml-2"></i> {{$blogPost->blogPostCategory->title}}
                    </a>

                    @foreach($blogPost->blogPostTags as $tag)
                        <a href="/blog-tag/{{$tag->slug}}" class="category ml-1"><i class="fa fa-tag ml-2"></i> {{$tag->title}}</a>
                    @endforeach
                </p>
            </div>
            <!-- / post-meta -->

            <p>
                {!! Str::words($blogPost->summary, 50, '...') !!}
            </p>

            <a href="{{ route('frontend.viewBlogSinglePostBySlug', [$blogPost->slug]) }}" class="btn btn-sm btn-primary">
                Read More
            </a>

        </div>
        <!-- / post-content -->

    </div>
    <!-- / blog-block -->

    <div class="spacer">&nbsp;</div>

    {{--<div class="blog block">

        <div id="slider-post" class="owl-carousel owl-theme carousel-full-nav">
            <img src="{{ URL::asset('frontend_theme/basix/images/blog-post1.jpg') }}" alt="">
            <img src="{{ URL::asset('frontend_theme/basix/images/blog-post2.jpg') }}" alt="">
            <img src="{{ URL::asset('frontend_theme/basix/images/blog-post3.jpg') }}" alt="">
        </div><!-- / owl-carousel -->

        <div class="post-content">
            <h5 class="mb-0">SLIDER POST</h5>
            <div class="post-meta">
                <p>
                    <i class="fa fa-user"></i>
                    <a href="#x" class="author ml-1">Admin</a>
                    <i class="fa fa-calendar ml-2"></i>
                    <a href="#x" class="date ml-1">Aug 16th 2017</a>
                    <i class="fa fa-tag ml-2"></i><a href="#x" class="category ml-1">Food</a>,
                    <a href="#x" class="category">Events</a>
                </p>
            </div><!-- / post-meta -->
            <p>
                Sed non nisi et mi posuere euismod at eu eros. Aenean hendrerit eros odio, eget semper
                ipsum pharetra et. Sed nec molestie urna. Proin quis urna eu nisi varius dignissim.
                Morbi odio ex, fringilla sit amet sapien vitae, ullamcorper efficitur sapien. Nullam
                eu fringilla erat...
            </p>
            <a href="single-post.html" class="btn btn-sm btn-primary">Read More</a>
        </div><!-- / post-content -->
    </div><!-- / blog-block -->

    <div class="spacer">&nbsp;</div>--}}

    {{--<div class="blog block">
        <div class="video-player blog-page-sidebar embed-responsive embed-responsive-16by9">
            <iframe src="https://www.youtube.com/embed/4Kf8VYDtMJo" allowfullscreen></iframe>
        </div><!-- / video-player -->
        <div class="post-content">
            <h5 class="mb-0">VIDEO POST</h5>
            <div class="post-meta">
                <p>
                    <i class="fa fa-user"></i>
                    <a href="#x" class="author ml-1">Admin</a>
                    <i class="fa fa-calendar ml-2"></i><a href="#x" class="date ml-1">Aug 13th 2017</a>
                    <i class="fa fa-tag ml-2"></i>
                    <a href="#x" class="category ml-1">Technology</a>
                </p>
            </div><!-- / post-meta -->
            <p>
                Sed non nisi et mi posuere euismod at eu eros. Aenean hendrerit eros odio, eget semper
                ipsum pharetra et. Sed nec molestie urna. Proin quis urna eu nisi varius dignissim.
                Morbi odio ex, fringilla sit amet sapien vitae, ullamcorper efficitur sapien.
                Nullam eu fringilla erat...
            </p>
            <a href="single-post.html" class="btn btn-sm btn-primary">Read More</a>
        </div><!-- / post-content -->
    </div><!-- / blog-block -->

    <div class="spacer">&nbsp;</div>--}}
@endforeach
