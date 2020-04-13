<div class="widget hide-while-angular-is-loading">
    <h4 class="widget-title">ARCHIVES</h4>
    <ul class="list-unstyled category-list">
        <li ng-repeat="yearAndMonth in blogPostDistinctArchiveYearAndMonthsArray">
            <a href="/blog-archives/<%=yearAndMonth%>">
                {{--{{\Carbon\Carbon::parse($archive)->format('Y F')}}--}}
                <%=yearAndMonth%>
            </a>
        </li>
    </ul>
</div>

