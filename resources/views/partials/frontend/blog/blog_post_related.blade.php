@if(count($blogPostsRelatedBlogPostCategoryOrTag) > 0)
<section class="related-posts">
    <h3 class="section-heading">Related Articles</h3>
    <ul class="list-unstyled related-post-list row">
        @foreach($blogPostsRelatedBlogPostCategoryOrTag as $related)
        <li class="col-md-6">

            @if(isset($related->blogPostImage->blog_post_image_path))
                <a href="{{ route('frontend.viewBlogSinglePostBySlug', [$related->slug]) }}">
                    <img src="{{isset($related->blogPostImage->blog_post_image_path) ?
                                URL::asset(''.$related->blogPostImage->blog_post_image_path.'') : '#'
                                }}" class="img-responsive" alt="Related Post" />
                </a>
            @endif

            <a href="{{ route('frontend.viewBlogSinglePostBySlug', [$related->slug]) }}" class="post-title">
                {{$related->title}}
            </a>
        </li>
        @endforeach
    </ul>
</section>
@endif
