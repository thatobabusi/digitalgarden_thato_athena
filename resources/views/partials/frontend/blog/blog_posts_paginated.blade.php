@php($blogPostsCount = 0)

@foreach($blogPosts as $blogPost)

    @php($blogPostsCount++)

    <div class="col-sm-6">

        <div class="post-entry-card">


            @if(isset($blogPost->blogPostImages->first()->src))

                <a href="{{ route('frontend.viewBlogSinglePostBySlug', [$blogPost->slug]) }}">
                    <img src="{{ URL::asset(''.$blogPost->blogPostImages->first()->src.'') }}"
                         class="img-responsive col-md-12"
                         alt="{{$blogPost->blogPostImages->first()->alt ?? 'Post Thumbnail'}}">
                </a>

            @endif

            <div class="post-info">
                <h3 class="post-title">
                    <a href="{{ route('frontend.viewBlogSinglePostBySlug', [$blogPost->slug]) }}">
                        {{$blogPost->title}}
                    </a>
                </h3>

                <p class="post-excerpt">
                    {!! $blogPost->summary !!}
                </p>

                <span class="post-meta">
                    <i class="fa fa-calendar-o"></i>
                    {{\Carbon\Carbon::parse($blogPost->created_at)}}
                </span>

                <a href="{{ route('frontend.viewBlogSinglePostBySlug', [$blogPost->slug]) }}"
                   class="read-more pull-right">
                    Read More
                </a>
            </div>

        </div>

    </div>

    {{--TODO::Messes up formating--}}
    @if($blogPostsCount % 2 === 0)
        <div class="clearfix"></div>
    @endif

@endforeach
