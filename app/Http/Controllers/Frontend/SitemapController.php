<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\Blog\BlogPostCategoryRepository;
use App\Repositories\Blog\BlogPostRepository;
use App\Repositories\Blog\BlogPostTagRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class SitemapController
 *
 * @package App\Http\Controllers\Frontend
 */
class SitemapController extends Controller
{
    /**
     * @var BlogPostRepository
     */
    protected $blogPostRepository;
    /**
     * @var BlogPostCategoryRepository
     */
    protected $blogPostCategory;
    /**
     * @var BlogPostTagRepository
     */
    protected $blogPostTagRepository;

    /**
     * SitemapController constructor.
     *
     * @param BlogPostRepository         $blogPostRepository
     * @param BlogPostCategoryRepository $blogPostCategory
     * @param BlogPostTagRepository      $blogPostTagRepository
     */
    public function __construct(BlogPostRepository $blogPostRepository, BlogPostCategoryRepository $blogPostCategory,
        BlogPostTagRepository $blogPostTagRepository)
    {
        $this->blogPostRepository = $blogPostRepository;
        $this->blogPostCategory = $blogPostCategory;
        $this->blogPostTagRepository = $blogPostTagRepository;
    }

    /**
     * @return Response
     */
    public function index()
    {
        $blogPosts = $this->blogPostRepository->getAllBlogPostsRecords();
        $blogPostCategories = $this->blogPostCategory->getAllCategories();

        return response()->view('sitemap.index', [
            'blogPosts' => $blogPosts,
            'blogPostCategories' => $blogPostCategories,
        ])->header('Content-Type', 'text/xml');
    }

    /**
     * @return Response
     */
    public function blogPosts(): Response
    {
        $blogPosts = $this->blogPostRepository->getAllBlogPostsRecords();
        return response()->view('sitemap.blogposts', [
            'blogPosts' => $blogPosts,
        ])->header('Content-Type', 'text/xml');
    }

    /**
     * @return Response
     */
    public function blogPostCategories(): Response
    {
        $blogPostCategories = $this->blogPostCategory->getAllCategories();
        return response()->view('sitemap.blogcategories', [
            'blogPostCategories' => $blogPostCategories,
        ])->header('Content-Type', 'text/xml');
    }

    /**
     * @return Response
     */
    public function blogPostTags(): Response
    {
        $blogPostTags = $this->blogPostTagRepository->getAllTags();
        return response()->view('sitemap.blogtags', [
            'blogPostTags' => $blogPostTags,
        ])->header('Content-Type', 'text/xml');
    }

}
