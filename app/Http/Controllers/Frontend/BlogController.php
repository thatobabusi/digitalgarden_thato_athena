<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog\BlogPost;
use App\Repositories\Blog\BlogPostCategoryRepository;
use App\Repositories\Blog\BlogPostImageRepository;
use App\Repositories\Blog\BlogPostRepository;
use App\Repositories\Blog\BlogPostTagRepository;
use App\Repositories\Blog\BlogRepository;
use App\Repositories\User\UserRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Models\Activity;
use Spatie\Menu\Link;
use Spatie\Menu\Menu;

class BlogController extends Controller
{

    /**
     * @var BlogRepository
     */
    protected $blogRepository;
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
     * BlogPostsController constructor.
     *
     * @param BlogRepository             $blogRepository
     * @param BlogPostRepository         $blogPostRepository
     * @param BlogPostCategoryRepository $blogPostCategory
     * @param BlogPostTagRepository      $blogPostTagRepository
     */
    public function __construct( BlogRepository $blogRepository, BlogPostRepository $blogPostRepository,
        BlogPostCategoryRepository $blogPostCategory, BlogPostTagRepository $blogPostTagRepository)
    {
        $this->blogRepository = $blogRepository;
        $this->blogPostRepository = $blogPostRepository;
        $this->blogPostCategory = $blogPostCategory;
        $this->blogPostTagRepository = $blogPostTagRepository;
    }

    public function getMoreByAjax(Request $request)
    {

        $data = [
            //'blogPosts' => $this->blogPostRepository->getAllBlogPostsRecords(10),
            'blogPosts' => BlogPost::paginate(4),
            'blogPostCategories' => $this->blogPostCategory->getAllCategoriesWhereHasBlogPosts(10),
            'blogPostTags' => $this->blogPostTagRepository->getAllTagsWhereHasBlogPosts(10),
            'blogPostDistinctArchiveYearAndMonthsArray' => $this->blogPostRepository->getAllDistinctArchiveYearAndMonthsArray(10),
            'featuredBlogPost' => BlogPost::inRandomOrder()->first()
        ];

        if ($request->ajax()) {

            $view = view('partials.frontend.blog.blog_posts_paginated',$data)->render();
            return response()->json(['html'=>$view]);
        }

        return view('frontend.blog.blog_index', $data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = [
            //'blogPosts' => $this->blogPostRepository->getAllBlogPostsRecords(10),
            'blogPosts' => BlogPost::paginate(4),
            'blogPostCategories' => $this->blogPostCategory->getAllCategoriesWhereHasBlogPosts(15),
            'blogPostTags' => $this->blogPostTagRepository->getAllTagsWhereHasBlogPosts(10),
            'blogPostDistinctArchiveYearAndMonthsArray' => $this->blogPostRepository->getAllDistinctArchiveYearAndMonthsArray(10),
            'featuredBlogPost' => BlogPost::inRandomOrder()->first()
        ];


        activity('front-end')
            ->withProperties(['ip_address' => get_user_ip_address_via_helper()])
            ->log('User landed on the Blog Index Page.');

        return view('frontend.blog.blog_index', $data);

    }

    /**
     * @param string $archive_date
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexArchive(string $archive_date)
    {
        $data = [
            'page_header' => 'Archive ' . $archive_date,
            'page_title' => 'Archive ' . $archive_date,
            'blogPosts' => $this->blogPostRepository->getAllBlogPostsRecordsByCriteria('archive_date', $archive_date,10),
            'blogPostCategories' => $this->blogPostCategory->getAllCategoriesWhereHasBlogPosts(15),
            'blogPostTags' => $this->blogPostTagRepository->getAllTagsWhereHasBlogPosts(10),
            'blogPostDistinctArchiveYearAndMonthsArray' => $this->blogPostRepository->getAllDistinctArchiveYearAndMonthsArray(10),
            'featuredBlogPost' => BlogPost::inRandomOrder()->first()
        ];


        activity('front-end')
            ->withProperties(['ip_address' => get_user_ip_address_via_helper()])
            ->log('User landed on the Blog Archive Page using archive date '.$archive_date.'.');

        return view('frontend.blog.blog_index', $data);

    }

    public function indexCategory(string $category_slug)
    {
        $data = [
            'page_header' => \Str::title('Category ' . $category_slug),
            'page_title' => \Str::title($category_slug),
            'blogPosts' => $this->blogPostRepository->getAllBlogPostsRecordsByCriteria('category', $category_slug,10),
            'blogPostCategories' => $this->blogPostCategory->getAllCategoriesWhereHasBlogPosts(15),
            'blogPostTags' => $this->blogPostTagRepository->getAllTagsWhereHasBlogPosts(10),
            'blogPostDistinctArchiveYearAndMonthsArray' => $this->blogPostRepository->getAllDistinctArchiveYearAndMonthsArray(10),
            'featuredBlogPost' => BlogPost::inRandomOrder()->first()
        ];


        activity('front-end')
            ->withProperties(['ip_address' => get_user_ip_address_via_helper()])
            ->log('User landed on the Blog Tag Page using tag slug '.$category_slug.'.');

        return view('frontend.blog.blog_index', $data);

    }

    public function indexTag(string $tag_slug)
    {
        $data = [
            'page_header' => \Str::title('Tag ' . $tag_slug),
            'page_title' => \Str::title($tag_slug),
            'blogPosts' => $this->blogPostRepository->getAllBlogPostsRecordsByCriteria('tag', $tag_slug,10),
            'blogPostCategories' => $this->blogPostCategory->getAllCategoriesWhereHasBlogPosts(15),
            'blogPostTags' => $this->blogPostTagRepository->getAllTagsWhereHasBlogPosts(10),
            'blogPostDistinctArchiveYearAndMonthsArray' => $this->blogPostRepository->getAllDistinctArchiveYearAndMonthsArray(10),
            'featuredBlogPost' => BlogPost::inRandomOrder()->first()
        ];

        activity('front-end')
            ->withProperties(['ip_address' => get_user_ip_address_via_helper()])
            ->log('User landed on the Blog Tag Page using tag slug '.$tag_slug.'.');

        return view('frontend.blog.blog_index', $data);

    }

    /**
     * @param string $slug
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showBlogPostBySlug(string $slug)
    {
        $blogPost = $this->blogPostRepository->getBlogPostRecordBySlug($slug);

        $blogPost->load('blogPostAuthor', 'blogPostTags', 'blogPostCategory'); //load these relations for use on the blade

        $data = [
            'blogPost' => $blogPost,
            'blogPosts' => $this->blogPostRepository->getAllBlogPostsRecords(10),
            'blogPostsRelatedBlogPostCategoryOrTag' => $this->blogPostRepository->getAllBlogPostsRecordsRelatedToThisBlogPostByCategoryOrTag($blogPost, 4),
            'blogPostCategories' => $this->blogPostCategory->getAllCategoriesWhereHasBlogPosts(10),
            'blogPostTags' => $this->blogPostTagRepository->getAllTagsWhereHasBlogPosts(10),
            'blogPostDistinctArchiveYearAndMonthsArray' => $this->blogPostRepository->getAllDistinctArchiveYearAndMonthsArray(10),
            'featuredBlogPost' => BlogPost::inRandomOrder()->first()
        ];

        activity('front-end | view single blog post')
            ->withProperties(['ip_address' => get_user_ip_address_via_helper()])
            ->log('User landed on the Blog Single Page by slug ' . $slug . '.');

        return view('frontend.blog.blog_single_view', $data);
    }
}
