<div class="widget hide-while-angular-is-loading">
    <h3 class="widget-title">TAGS</h3>
    <ul class="list-inline tag-list">
    <li ng-repeat="blogPostTag in blogPostTags">
        <a href="/blog-tag/<%=blogPostTag.slug%>">
            <%=blogPostTag.title%>
        </a>
    </li>
    </ul>
</div>
