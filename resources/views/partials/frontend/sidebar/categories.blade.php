@if(count($blogPostCategories) > 0)
    <div class="sidebar-widget">
        <h6 class="widget-title">CATEGORIES</h6>
        @foreach($blogPostCategories as $category)
            <p class="category-widget">
                <a href="/blog-category/{{$category->slug}}">
                    {{$category->title}} ({{$category->blogPosts->count()}})
                </a>
            </p>
        @endforeach
        <!-- / category-widget -->
    </div>
    <!-- / sidebar-widget -->
@endif
