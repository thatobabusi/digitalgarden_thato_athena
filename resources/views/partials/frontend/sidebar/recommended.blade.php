<div class="widget">
    <h4 class="widget-title">RECOMMENDED READS...</h4>
    <ul class="list-unstyled recommended-posts">
        @php($blogPostsCount = 0)
        @foreach($blogPosts as $blogPost)
            @php($blogPostsCount++)
            <li>
                <div class="post-entry-sidebar clearfix">
                    <a href="#" class="left">
                        <img src="{{ URL::asset(''.$blogPost->blogPostImage->blog_post_image_path.'') }}" alt="Post Thumbnail"
                        width="80px">
                    </a>
                    <div class="right">
                        <h4 class="media-heading post-title">
                            <a href="#">
                                {{$blogPost->title}}
                            </a>
                        </h4>
                        <span class="timestamp">1h ago</span>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>
