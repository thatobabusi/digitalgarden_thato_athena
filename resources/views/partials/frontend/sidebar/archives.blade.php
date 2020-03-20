@if(count($blogPostDistinctArchiveYearAndMonthsArray) > 0)
    <div class="widget">
        <h4 class="widget-title">ARCHIVES</h4>
        <ul class="list-unstyled category-list">
            @foreach($blogPostDistinctArchiveYearAndMonthsArray as $archive)
                <li><a href="/blog-archives/{{$archive}}">{{\Carbon\Carbon::parse($archive)->format('Y F')}}</a></li>
            @endforeach
        </ul>
    </div>
@endif
