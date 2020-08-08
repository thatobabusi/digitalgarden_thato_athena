<div class="sidebar-widget">
    <h6 class="widget-title mb-3">TAGS</h6>
    <div class="tag-cloud">
        @foreach($blogPost->blogPostTags as $tag)
            <a href="/blog-tag/{{$tag->slug}}" class="btn btn-sm btn-outline-primary rectangle">
                {{$tag->title}}
            </a>
        @endforeach
    </div>
    <!-- / tag-cloud -->
    <!-- / tags-widget -->
</div>
