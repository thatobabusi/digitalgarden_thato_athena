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

    <div class="clearfix margin-top-30 margin-bottom-30"></div>
@endif
