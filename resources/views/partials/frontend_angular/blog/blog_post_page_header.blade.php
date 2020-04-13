<!-- PAGE HEADER TITLE -->
<div class="text-center hide-while-angular-is-loading">
    <h1>
        {{--{{$page_header ?? ''}} {{$page_title ?? ''}}--}}
        {{--<%=page_header%> <%=page_title%>--}}
    </h1>

    @if(isset($page_title) && $page_title !== 'Blog')
        <h1>Blog Posts by {{$page_header ?? ''}} {{$page_title ?? ''}}</h1>
        {{--<h1>Blog Posts by <%=page_header%> <%=page_title%></h1>--}}
    @else
        <h1><%=page_header%></h1>
    @endif
</div>
<!-- END PAGE HEADER TITLE -->
