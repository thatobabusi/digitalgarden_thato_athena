<div class="col-md-12">
    <ul class="list-inline tag-list">

        <li>
            <a href="/blog-category/{{$blogPost->blogPostCategory->id}}">
                Category: {{$blogPost->blogPostCategory->title}}
            </a>
        </li>

        @foreach($blogPost->blogPostTags as $tag)
            <li><a href="#">{{$tag->title}}</a></li>
        @endforeach
    </ul>
</div>
