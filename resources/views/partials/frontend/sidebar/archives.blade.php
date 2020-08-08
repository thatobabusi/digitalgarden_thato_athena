@if(count($blogPostDistinctArchiveYearAndMonthsArray) > 0)
    <div class="sidebar-widget">
        <h6 class="widget-title">ARCHIVES</h6>
        @foreach($blogPostDistinctArchiveYearAndMonthsArray as $archive)
            <p class="category-widget">
                <a href="/blog-archives/{{$archive}}">
                    {{\Carbon\Carbon::parse($archive)->format('Y F')}}
                </a>
            </p>
        @endforeach
        <!-- / archive-widget -->
    </div>
    <!-- / sidebar-widget -->
@endif
