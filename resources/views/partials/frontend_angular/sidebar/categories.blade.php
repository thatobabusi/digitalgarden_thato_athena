<div class="widget hide-while-angular-is-loading">
    <h4 class="widget-title">CATEGORIES</h4>
    <ul class="list-unstyled category-list">
        <li ng-repeat="blogPostCategory in blogPostCategories">
            <a href="/blog-category/<%=blogPostCategory.slug%>">
                <%=blogPostCategory.title%>
            </a>
        </li>
    </ul>
</div>
