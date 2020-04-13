@if(count($blogPostCategories) > 0)
    <div class="widget hide-while-angular-is-loading">
        <h4 class="widget-title">CATEGORIES</h4>
        <ul class="list-unstyled category-list">
            @foreach($blogPostCategories as $category)
                <li><a href="/blog-category/{{$category->slug}}">{{$category->title}} ({{$category->blogPosts->count()}})</a></li>
            @endforeach
        </ul>
    </div>
@endif
