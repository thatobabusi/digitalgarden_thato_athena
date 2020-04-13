<div class="col-md-12">
    <ul class="list-inline tag-list">

        <li>
            <a href="/blog-category/{{$blogPost->blogPostCategory->slug}}">
                Category: {{$blogPost->blogPostCategory->title}}
            </a>
        </li>

        @foreach($blogPost->blogPostTags as $tag)
            <li><a href="/blog-tag/{{$tag->slug}}">{{$tag->title}}</a></li>
        @endforeach
    </ul>
</div>
