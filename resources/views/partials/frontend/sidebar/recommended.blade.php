<div class="sidebar-widget">
    <h6 class="widget-title">RECOMMENDED READS</h6>
    @php($blogPostsCount = 0)
    @foreach($blogPostsRecommended as $blogPost)
        <p class="category-widget">
            <div class="recent-posts first">
                @if(isset($blogPost->blogPostImage()->src))
                    <div class="recent-post-image">
                        <img src="{{ isset($blogPost->blogPostImage()->src) ? URL::asset(''.$blogPost->blogPostImage()->src.'') : '#' }}" alt="">
                    </div>
                @endif

                <!-- / recent-post-image -->
                <div class="recent-post-content">
                    <a href="{{ route('frontend.viewBlogSinglePostBySlug', [$blogPost->slug]) }}">
                        {{Str::words($blogPost->title, 8, '...')}}
                    </a>
                    <p>{{ \Carbon\Carbon::parse($blogPost->created_at)->diffForHumans() }}</p>
                </div>
                <!-- / recent-post-content -->
            </div>
        </p>
    @endforeach
    <!-- / recent-posts -->
    <!-- / recent-posts-widget -->
</div>
<!-- / sidebar-widget -->

