<?php

namespace App\Http\Controllers\Frontend;

use App\Repositories\Blog\BlogPostCategoryRepository;
use App\Repositories\Blog\BlogPostRepository;
use App\Repositories\Blog\BlogPostTagRepository;
use App\Repositories\Image\ImageRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Throwable;

/**
 * Class BlogController
 *
 * @package App\Http\Controllers\Frontend
 */
class BlogController extends Controller
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
     * @var ImageRepository
     */
    protected $imageRepository;

    /**
     * BlogController constructor.
     *
     * @param BlogPostRepository         $blogPostRepository
     * @param BlogPostCategoryRepository $blogPostCategory
     * @param BlogPostTagRepository      $blogPostTagRepository
     * @param ImageRepository            $imageRepository
     */
    public function __construct( BlogPostRepository $blogPostRepository, BlogPostCategoryRepository $blogPostCategory,
        BlogPostTagRepository $blogPostTagRepository, ImageRepository $imageRepository)
    {
        $this->blogPostRepository = $blogPostRepository;
        $this->blogPostCategory = $blogPostCategory;
        $this->blogPostTagRepository = $blogPostTagRepository;
        $this->imageRepository = $imageRepository;
    }

    /**
     * @param Request $request
     *
     * @return Factory|JsonResponse|View
     * @throws Throwable
     */
    public function getMoreByAjax(Request $request)
    {
        $data = [
            'blogPosts' => $this->blogPostRepository->getAllBlogPostsRecordsWithPagination('4'),
            'blogPostCategories' => $this->blogPostCategory->getAllCategoriesWhereHasBlogPosts('10'),
            'blogPostTags' => $this->blogPostTagRepository->getAllTagsWhereHasBlogPosts('10'),
            'blogPostDistinctArchiveYearAndMonthsArray' => $this->blogPostRepository->getAllDistinctArchiveYearAndMonthsArray('10'),
            'featuredBlogPost' => $this->blogPostRepository->getFeaturedBlogPosts('1')
        ];

        if ($request->ajax()) {
            $view = view('partials.frontend.blog.blog_posts_paginated',$data)->render();
            return response()->json(['html'=>$view]);
        }

        return view('frontend.blog.blog_index', $data);
    }

    /**
     * @return Factory|View
     */
    public function index()
    {
        $data = $this->getDynamicIndexContent();

        activity('front-end')
            ->withProperties(['ip_address' => get_user_ip_address_via_helper()])
            ->log('User landed on the Blog Index Page.');

        return view('frontend.angular.blog_index', $data);
        //return view('frontend.blog.blog_index', $data);
    }

    /**
     * @param string $archive_date
     *
     * @return Factory|View
     */
    public function indexArchive(string $archive_date)
    {

        $data = $this->getDynamicIndexContent('archive_date', $archive_date);

        activity('front-end')
            ->withProperties(['ip_address' => get_user_ip_address_via_helper()])
            ->log('User landed on the Blog Archive Page using archive date '.$archive_date.'.');

        return view('frontend.angular.blog_index', $data);

    }

    /**
     * @param string $category_slug
     *
     * @return Factory|View
     */
    public function indexCategory(string $category_slug)
    {
        $data = $this->getDynamicIndexContent('category', $category_slug);

        activity('front-end')
            ->withProperties(['ip_address' => get_user_ip_address_via_helper()])
            ->log('User landed on the Blog Category Page using category slug '.$category_slug.'.');

        return view('frontend.angular.blog_index_category', $data);
        //return view('frontend.blog.blog_index', $data);

    }

    /**
     * @param string $tag_slug
     *
     * @return Factory|View
     */
    public function indexTag(string $tag_slug)
    {
        $data = $this->getDynamicIndexContent('tag', $tag_slug);

        activity('front-end')
            ->withProperties(['ip_address' => get_user_ip_address_via_helper()])
            ->log('User landed on the Blog Tag Page using tag slug '.$tag_slug.'.');

        return view('frontend.angular.blog_index_tag', $data);
        //return view('frontend.blog.blog_index', $data);

    }

    /**
     * @param string|null $criteria
     * @param string|null $criteria_value
     *
     * @return array
     */
    public function getDynamicIndexContent(string $criteria = null, string $criteria_value = null): array
    {
        $page_header = $criteria;
        if(isset($criteria)) {
            if(Str::contains($criteria, '_')){
                $page_header = Str::replaceFirst('_', ' ',$criteria);
            }
        }
        return [
            'page_header' => Str::title( $page_header ?? 'Blog'),
            'page_title' => Str::title($criteria_value ?? 'Blog'),
            'blogPosts' => $this->blogPostRepository->getAllBlogPostsRecordsByCriteria($criteria, $criteria_value, '20'),
            'blogPostCategories' => $this->blogPostCategory->getAllCategoriesWhereHasBlogPosts('15'),
            'blogPostTags' => $this->blogPostTagRepository->getAllTagsWhereHasBlogPosts('10'),
            'blogPostDistinctArchiveYearAndMonthsArray' => $this->blogPostRepository->getAllDistinctArchiveYearAndMonthsArray('10'),
            'featuredBlogPost' => $this->blogPostRepository->getFeaturedBlogPosts('1')
        ];

    }

    /**
     * @param string $slug
     *
     * @return Factory|View
     */
    public function showBlogPostBySlug(string $slug)
    {
        $blogPost = $this->blogPostRepository->getBlogPostRecordBySlug($slug);

        $data = [
            'blogPost' => $blogPost,
            'blogPosts' => $this->blogPostRepository->getAllBlogPostsRecords('10'),
            'blogPostsRelatedBlogPostCategoryOrTag' => $this->blogPostRepository->getAllBlogPostsRecordsRelatedToThisBlogPostByCategoryOrTag($blogPost, '4'),
            'blogPostCategories' => $this->blogPostCategory->getAllCategoriesWhereHasBlogPosts('10'),
            'blogPostTags' => $this->blogPostTagRepository->getAllTagsWhereHasBlogPosts('10'),
            'blogPostDistinctArchiveYearAndMonthsArray' => $this->blogPostRepository->getAllDistinctArchiveYearAndMonthsArray('10'),
            'featuredBlogPost' => $this->blogPostRepository->getFeaturedBlogPosts('1')
        ];

        activity('front-end | view single blog post')
            ->withProperties(['ip_address' => get_user_ip_address_via_helper()])
            ->log('User landed on the Blog Single Page by slug ' . $slug . '.');

        return view('frontend.blog.blog_single_view', $data);
    }
}
