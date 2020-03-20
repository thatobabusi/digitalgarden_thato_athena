@if(count($blogPostTags) > 0)
    <div class="widget">
        <h3 class="widget-title">TAGS</h3>
        <ul class="list-inline tag-list">
            @foreach($blogPostTags as $tag)
            <li><a href="/blog-tag/{{$tag->slug}}">{{$tag->title}}</a></li>
            @endforeach
        </ul>
    </div>
@endif
