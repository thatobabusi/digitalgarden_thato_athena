<section class="related-posts">
    <h3 class="section-heading text-center">Advertisements</h3>
    <p class="text-center">
        Show some support to some of my affiliates below..
    </p>
    <ul class="list-unstyled related-post-list row">
        @foreach($blogPostsRelatedBlogPostCategoryOrTag as $related)
            <li class="col-md-3">

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
