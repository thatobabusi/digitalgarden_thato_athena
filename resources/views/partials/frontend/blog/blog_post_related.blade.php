@if(count($blogPostsRelatedBlogPostCategoryOrTag) > 0)
    <div class="blog block">s
        @foreach($blogPostsRelatedBlogPostCategoryOrTag as $related)

            <div class="col-sm-12 col-md-6">
                <div class="card">
                    @if(isset($related->blogPostImage()->src))
                    <img class="card-img-top" src="{{URL::asset(''.$related->blogPostImage()->src.'') ?? '#'}}"
                         alt="{{ $related->blogPostImage()->alt ?? 'Related Post' }}">
                    @endif
                    <div class="card-body">
                        <h4 class="card-title">{{$related->title}}</h4>
                        <p class="card-text">Left-aligned content. Example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="{{ route('frontend.viewBlogSinglePostBySlug', [$related->slug]) }}"
                           class="btn btn-primary pill">
                            Read More...
                        </a>
                    </div><!-- / card-body -->
                </div><!-- / card -->
            </div><!-- / column -->
            <div class="spacer">&nbsp;</div>
        @endforeach
    </div>
@endif
