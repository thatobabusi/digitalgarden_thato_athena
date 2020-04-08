<article class="entry-post entry-post-single">
    <header class="entry-header">

        <h1 class="entry-title">
            <a href="{{ route('frontend.viewBlogSinglePostBySlug', [$blogPost->slug]) }}">
                {{$blogPost->title}}
            </a>
        </h1>

        <p class="entry-lead">
            {!! $blogPost->summary !!}
        </p>

        <div class="meta-line">

            <span class="post-author">
                <i class="fa fa-user"></i>
                <a href="#">{{$blogPost->blogPostAuthor->name}}</a>
            </span>

            <span class="post-date">
                <i class="fa fa-calendar"></i>
                {{\Carbon\Carbon::parse($blogPost->created_at)}}
            </span>
        </div>

    </header>

    <figure class="media">

        @if(isset($blogPost->blogPostImage()->src))
            <a class="col-md-12" href="{{ route('frontend.viewBlogSinglePostBySlug', [$blogPost->slug]) }}">
                <img src="{{isset($blogPost->blogPostImage()->src) ?
                     URL::asset(''.$blogPost->blogPostImage()->src.'') : '#'}}" class="img-responsive col-md-12"
                     alt="{{$blogPost->blogPostImages()->alt ?? 'Post Thumbnail'}}" />
            </a>
        @endif

        @if(isset($blogPost->blogPostImage()->credits_if_applicable))
        <span class="media-attribution text-muted-2x">
            Illustration by
            <a href="{{$blogPost->blogPostImage()->credits_if_applicable}}" target="_blank">
                {{$blogPost->blogPostImage()->credits_if_applicable}}
            </a>
        </span>
        @endif

    </figure>

    <div class="content">
        <p>
            {!! $blogPost->body !!}
        </p>
    </div>

</article>

