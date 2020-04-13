<div ng-repeat="blogPost in blogPosts" class="col-sm-6">

    <div style="height: 435px !important;">
        <div class="post-entry-card">

            <a href="blog/<%=blogPost.slug%>">
                <img src="/<%=blogPost.blog_post_images[0].src%>"
                     class="img-responsive col-md-12 getBase64Image">
            </a>

            <div class="post-info">
                <h3 class="post-title">
                    <a href="blog/<%=blogPost.slug%>">
                        <%=blogPost.title%>
                    </a>
                </h3>
                <p class="post-excerpt text-wrap">
                    <%=blogPost.summary%>
                </p>
                <span class="post-meta">
                    <i class="fa fa-calendar-o"></i>
                    <%=blogPost.created_at%>
                </span>

                <a href="blog/<%=blogPost.slug%>" class="read-more pull-right">
                    Read More
                </a>
            </div>

            {{--<p class="post-excerpt text-wrap">
                <%=blogPost.summary%>
            </p>--}}

            {{--<span class="post-meta">
                                    <i class="fa fa-calendar-o"></i>
                                    <%=blogPost.created_at%>
                                </span>

            <a href="blog/<%=blogPost.slug%>" class="read-more pull-right">
                Read More
            </a>--}}

        </div>
    </div>

    {{--@if($blogPostsCount % 2 === 0)
        <div class="clearfix"></div>
    @endif--}}
</div>
