<div class="widget hide-while-angular-is-loading">
    <h4 class="widget-title">RECOMMENDED READS...</h4>
    <ul class="list-unstyled recommended-posts">

        <li ng-repeat="blogPost in blogPosts">
            <div class="post-entry-sidebar clearfix">

                <a href="/blog/<%=blogPost.slug%>" class="left">
                    <img style="width:90px !important;" src="/<%=blogPost.blog_post_images[0].src%>"
                         alt="<%=blogPost.blog_post_images[0].alt%>"
                         class="img-responsive col-md-12 getBase64Image"
                    />
                </a>

                <div class="right">
                    <h4 class="media-heading post-title">
                        <a href="/blog/<%=blogPost.slug%>">
                            <%=blogPost.title%>
                        </a>
                    </h4>
                    <span class="timestamp">
                        <%=blogPost.created_at%>
                    </span>
                </div>

            </div>
        </li>

    </ul>
</div>


