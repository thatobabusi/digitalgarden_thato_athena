<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <sitemap>
        <url>
            <loc>{{config('app.url', 'http:://localhost.test')}}/about/professional</loc>
            <changefreq>monthly</changefreq>
            <priority>0.6</priority>
        </url>
        <url>
            <loc>{{config('app.url', 'http:://localhost.test')}}/about/personal</loc>
            <changefreq>monthly</changefreq>
            <priority>0.6</priority>
        </url>
        <url>
            <loc>{{config('app.url', 'http:://localhost.test')}}/blog</loc>
            <changefreq>weekly</changefreq>
            <priority>0.6</priority>
        </url>
        <url>
            <loc>{{config('app.url', 'http:://localhost.test')}}/contact</loc>
            <changefreq>monthly</changefreq>
            <priority>0.6</priority>
        </url>
    </sitemap>
    <sitemap>
        <loc>{{config('app.url', 'http:://localhost.test')}}/sitemap.xml/blogposts</loc>
    </sitemap>
    <sitemap>
        <loc>{{config('app.url', 'http:://localhost.test')}}/sitemap.xml/blogcategories</loc>
    </sitemap>
    <sitemap>
        <loc>{{config('app.url', 'http:://localhost.test')}}/sitemap.xml/blogtags</loc>
    </sitemap>
</sitemapindex>

{{--<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($blogPostCategories as $category)
        <url>
            <loc>{{config('app.url', 'Laravel')}}/blog-category/{{ $category->slug }}</loc>
            <lastmod>{{ $category->updated_at }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.6</priority>
        </url>
    @endforeach
    @foreach ($blogPosts as $post)
        <url>
            <loc>{{config('app.url', 'Laravel')}}/blog/{{ $post->slug }}</loc>
            <lastmod>{{ $post->updated_at }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.6</priority>
        </url>
    @endforeach
</urlset>--}}

