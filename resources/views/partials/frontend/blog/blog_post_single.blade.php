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
        @if(isset($blogPost->blogPostImage->blog_post_image_path))
            <a href="{{ route('frontend.viewBlogSinglePostBySlug', [$blogPost->slug]) }}">
                <img src="{{isset($blogPost->blogPostImage->blog_post_image_path) ?
                                URL::asset(''.$blogPost->blogPostImage->blog_post_image_path.'') : '#'
                                }}" class="img-responsive" alt="Image Thumbnail" />
            </a>
        @endif

        <span class="media-attribution text-muted-2x">
            Illustration by
            <a href="http://www.unsplash.com" target="_blank">
                Unsplash
            </a>
        </span>

    </figure>

    <div class="content">
        <p>
            {!! $blogPost->body !!}
        </p>
    </div>

</article>
