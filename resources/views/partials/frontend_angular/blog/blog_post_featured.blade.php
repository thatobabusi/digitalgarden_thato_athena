<div class="entry-post entry-post-fullwidth">

    <figure class="media">
        <a href="/blog/<%=featuredBlogPost.slug%>">
            <img src="/<%=featuredBlogPost.blog_post_images[0].src%>"
                 class="img-responsive col-md-12"
                 alt="<%=featuredBlogPost.blog_post_images[0].alt%>"
            />
        </a>
    </figure>

    <div class="entry-content">

        <div class="entry-header">

            <h2 class="entry-title hide-while-angular-is-loading">
                <a href="/blog/<%=featuredBlogPost.slug%>">
                    <%=featuredBlogPost.title%>
                </a>
            </h2>

            <div class="meta-line hide-while-angular-is-loading">

                <span class="post-date">
                    <i class="fa fa-calendar"></i>
                     <%=featuredBlogPost.created_at%>
                </span>

                <span class="post-comment">
                    <i class="fa fa-comments"></i>
                    <a href="#">35 Comments</a>
                </span>

            </div>
        </div>

        <div class="excerpt hide-while-angular-is-loading">
            <p>
                <%=featuredBlogPost.summary%>
            </p>
            <p class="read-more">
                <a href="/blog/<%=featuredBlogPost.slug%>" class="read-more">Read More
                </a>
            </p>
        </div>

    </div>

</div>
