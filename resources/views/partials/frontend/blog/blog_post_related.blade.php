@if(count($blogPostsRelatedBlogPostCategoryOrTag) > 0)
<section class="related-posts">
    <h3 class="section-heading">Related Articles</h3>
    <ul class="list-unstyled related-post-list row">
        @foreach($blogPostsRelatedBlogPostCategoryOrTag as $related)
        <li class="col-md-6">

            @if(isset($blogPost->blogPostImage()->src))
                <a class="col-md-12" href="{{ route('frontend.viewBlogSinglePostBySlug', [$related->slug]) }}">
                    <img src="{{isset($blogPost->blogPostImage()->src) ?
                         URL::asset(''.$blogPost->blogPostImage()->src.'') : '#'}}" class="img-responsive col-md-12"
                         alt="{{ $blogPost->blogPostImage()->alt ?? 'Related Post' }}"
                    />
                </a>
            @endif

            <a href="{{ route('frontend.viewBlogSinglePostBySlug', [$related->slug]) }}" class="post-title col-md-12">
                {{$related->title}}
            </a>
        </li>
        @endforeach
    </ul>
</section>
@endif
