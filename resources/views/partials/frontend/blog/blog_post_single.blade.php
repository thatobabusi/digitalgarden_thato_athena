<div class="blog block">
    @if(isset($blogPost->blogPostImage()->src))
        <img src="{{isset($blogPost->blogPostImage()->src) ? URL::asset(''.$blogPost->blogPostImage()->src.'') : '#'}}"
             class="block-image-big" alt="{{$blogPost->blogPostImages()->alt ?? 'Post Thumbnail'}}">

        @if(isset($blogPost->blogPostImage()->credits_if_applicable))
            <span class="media-attribution text-muted-2x"> Illustration credits
                <a href="{{$blogPost->blogPostImage()->credits_if_applicable}}" target="_blank">
                    {{$blogPost->blogPostImage()->credits_if_applicable}}
                </a>
            </span>
        @endif
    @endif

    <div class="post-content">
        <h5 class="mb-0">{{$blogPost->title}}</h5>
        <div class="post-meta">
            <p>
                <i class="fa fa-user"></i>
                <a href="#x" class="author ml-1">{{$blogPost->blogPostAuthor->name}}</a>
                <i class="fa fa-calendar ml-2"></i>
                <a href="#x" class="date ml-1">{{\Carbon\Carbon::parse($blogPost->created_at)}}</a>
                <i class="fa fa-tag ml-2"></i><a href="#x" class="category ml-1">Travel</a>
            </p>
            {!!
            Share::page( url()->current(), $blogPost->title, ['title' => 'Share this post'], '<ul>', '</ul>' )
                ->facebook()
                ->twitter()
                ->linkedin($blogPost->summary)
                ->whatsapp()
                ->telegram()
            !!}
        </div><!-- / post-meta -->
        <blockquote class="blockquote">
            <p class="mb-0">{!! $blogPost->summary !!}</p>
        </blockquote>

        <p>{!! $blogPost->body !!}</p>
    </div><!-- / post-content -->
</div>
<!-- / blog-block -->

<div class="spacer">&nbsp;</div>
