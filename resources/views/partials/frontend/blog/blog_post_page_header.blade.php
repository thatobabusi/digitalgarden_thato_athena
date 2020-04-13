<!-- PAGE HEADER TITLE -->
<div class="text-center">
    @if(isset($page_title) && $page_title !== 'Blog')
        <h1>Blog Posts by {{$page_header}} {{$page_title ?? ''}}</h1>
    @else
        <h1>Blog</h1>
    @endif
</div>
<!-- END PAGE HEADER TITLE -->
