<div class="widget hide-while-angular-is-loading">
    <h4 class="widget-title">RECOMMENDED READS...</h4>
    <ul class="list-unstyled recommended-posts">
        @php($blogPostsCount = 0)
        @foreach($blogPosts as $blogPost)
            <li>
                <div class="post-entry-sidebar clearfix">

                    @if(isset($blogPost->blogPostImage()->src))
                        <a href="{{ route('frontend.viewBlogSinglePostBySlug', [$blogPost->slug]) }}" class="left">
                            <img src="{{ isset($blogPost->blogPostImage()->src) ? URL::asset(''.$blogPost->blogPostImage()->src.'') : '#' }}" alt="{{$blogPost->blogPostImage()->alt ?? 'Post Thumbnail'}}"
                            width="80px">
                        </a>
                    @endif
                    <div class="right">
                        <h4 class="media-heading post-title">
                            <a href="{{ route('frontend.viewBlogSinglePostBySlug', [$blogPost->slug]) }}">
                                {{$blogPost->title}}
                            </a>
                        </h4>
                        <span class="timestamp">{{ \Carbon\Carbon::parse($blogPost->created_at)->diffForHumans() }}</span>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>


