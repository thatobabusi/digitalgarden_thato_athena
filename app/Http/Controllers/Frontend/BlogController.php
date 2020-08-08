<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog\BlogPost;
use App\Models\Blog\BlogPostCategory;
use App\Models\Blog\BlogPostPostTag;
use App\Models\Blog\BlogPostTag;
use App\Models\User\User;
use App\Repositories\Blog\BlogPostCategoryRepository;
use App\Repositories\Blog\BlogPostRepository;
use App\Repositories\Blog\BlogPostTagRepository;
use App\Repositories\System\SystemImageRepository;
use App\Repositories\System\SystemMetaRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Meta;
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
     * @var SystemImageRepository
     */
    protected $systemImageRepository;
    /**
     * @var SystemMetaRepository
     */
    protected $systemMetadataRepository;
    /**
     * @var string
     */
    public $authorDefault;

    /**
     * BlogController constructor.
     *
     * @param BlogPostRepository         $blogPostRepository
     * @param BlogPostCategoryRepository $blogPostCategory
     * @param BlogPostTagRepository      $blogPostTagRepository
     * @param SystemImageRepository      $systemImageRepository
     * @param SystemMetaRepository       $systemMetadataRepository
     */
    public function __construct( BlogPostRepository $blogPostRepository, BlogPostCategoryRepository $blogPostCategory,
        BlogPostTagRepository $blogPostTagRepository, SystemImageRepository $systemImageRepository, SystemMetaRepository $systemMetadataRepository)
    {
        $this->authorDefault = (string)config('app.app_developer_name');
        $this->blogPostRepository = $blogPostRepository;
        $this->blogPostCategory = $blogPostCategory;
        $this->blogPostTagRepository = $blogPostTagRepository;
        $this->systemImageRepository = $systemImageRepository;
        $this->systemMetadataRepository = $systemMetadataRepository;
    }

    /**
     * @param Request $request
     *
     * @return Factory|JsonResponse|View
     * @throws Throwable
     */
    public function index(Request $request)
    {
        $data = $this->blogPostRepository->getDynamicIndexContent();

        $this->systemMetadataRepository->formatMetaData(
            "index,follow",
            "Blog",
            "$this->authorDefault",
            "Blog",
            "View all Blog posts"
        );

        if ($request->ajax())
        {
            $view = view('partials.frontend.blog.blog_posts_paginated',$data)->render();
            return response()->json(['html'=>$view]);
        }

        activity('front-end')->withProperties(['ip_address' => get_user_ip_address_via_helper()])
            ->log('User landed on the Blog Index Page.');

        return view('frontend.blog.blog_index', $data);
    }

    /**
     * @param string $archive_date
     *
     * @return Factory|View
     */
    public function indexArchive(string $archive_date)
    {
        $data = $this->blogPostRepository->getDynamicIndexContent('archive_date', $archive_date);

        $this->systemMetadataRepository->formatMetaData(
            "index,follow",
            "Blog Posts Archive | $archive_date",
            "$this->authorDefault",
            "Blog, Archive, $archive_date",
            "View all Blog Posts Archive for the period of $archive_date"
        );

        activity('front-end')->withProperties(['ip_address' => get_user_ip_address_via_helper()])
            ->log('User landed on the Blog Archive Page using archive date '.$archive_date.'.');

        return view('frontend.blog.blog_index', $data);
    }

    /**
     * @param string $category_slug
     *
     * @return Factory|View
     */
    public function indexCategory(string $category_slug)
    {
        $data = $this->blogPostRepository->getDynamicIndexContent('category', $category_slug);

        $category = Str::title($category_slug);

        $this->systemMetadataRepository->formatMetaData(
            "index,follow",
            "Blog Posts Category | $category",
            "$this->authorDefault",
            "Blog, Archive, $category",
            "View all Blog Posts by $category Category"
        );

        activity('front-end')->withProperties(['ip_address' => get_user_ip_address_via_helper()])
            ->log('User landed on the Blog Category Page using category slug '.$category_slug.'.');

        return view('frontend.blog.blog_index', $data);
    }

    /**
     * @param string $tag_slug
     *
     * @return Factory|View
     */
    public function indexTag(string $tag_slug)
    {
        $data = $this->blogPostRepository->getDynamicIndexContent('tag', $tag_slug);

        $tag = Str::title(Str::of($tag_slug)->replace('-', ' '));

        $this->systemMetadataRepository->formatMetaData(
            "index,follow",
            "Blog Posts Tag | $tag",
            "$this->authorDefault",
            "Blog, Tag, $tag",
            "View all Blog Posts with $tag Tag"
        );

        activity('front-end')->withProperties(['ip_address' => get_user_ip_address_via_helper()])
            ->log('User landed on the Blog Tag Page using tag slug '.$tag_slug.'.');

        return view('frontend.blog.blog_index', $data);
    }

    /**
     * @param string $slug
     *
     * @return Factory|View
     */
    public function showBlogPostBySlug(string $slug)
    {
        $blogPost = $this->blogPostRepository->getBlogPostRecordBySlug($slug);
        $data = $this->blogPostRepository->formatBlogPostDataDetailsForDisplay($blogPost);
        $keywords = $this->blogPostRepository->getBlogPostKeywords($blogPost);
        $title = Str::title($blogPost->title);
        $summary = Str::title($blogPost->summary);
        $image = $blogPost->blogPostImage()->src;

        $this->systemMetadataRepository->formatMetaData(
            "index,follow",
            "$title",
            "$this->authorDefault",
            "Blog post, $keywords",
            "$summary",
            "$image"
        );

        #See https://awssat.com/opensource/laravel-visits/ for how to use
        //visits($blogPost)->increment();

        #Log it
        activity('front-end | view single blog post')->withProperties(['ip_address' => get_user_ip_address_via_helper()])
            ->log('User landed on the Blog Single Page by slug ' . $slug . '.');

        return view('frontend.blog.blog_single_view', $data);
    }

    public function search(Request $request)
    {
        $search_value = $request->search;
        $search_results = collect();

        if(isset($search_value)) {
            $users_id_array = User::where('name', 'LIKE', '%' . $search_value . '%')
                ->orWhere('email', 'LIKE', '%' . $search_value . '%')
                ->pluck('id');

            $categories_id_array = BlogPostCategory::where('title', 'LIKE', '%' . $search_value . '%')
                ->orWhere('slug', 'LIKE', '%' . $search_value . '%')
                ->pluck('id');

            $tags_id_array = BlogPostTag::where('title', 'LIKE', '%' . $search_value . '%')
                ->orWhere('slug', 'LIKE', '%' . $search_value . '%')
                ->pluck('id');

            $blog_posts_id_array = BlogPostPostTag::whereIn('blog_post_tag_id', $tags_id_array)
                ->pluck('blog_post_id');

            $search_results = BlogPost::where('title', 'LIKE', '%' . $search_value . '%')
                ->orWhere('slug', 'LIKE', '%' . $search_value . '%')
                ->orWhere('summary', 'LIKE', '%' . $search_value . '%')
                ->orWhere('body', 'LIKE', '%' . $search_value . '%')
                ->orWhereIn('user_id', $users_id_array)
                ->orWhereIn('blog_post_category_id', $categories_id_array)
                ->orWhereIn('id', $blog_posts_id_array)
                ->orderBy('created_at', 'DESC')
                ->get()->take(18);
        }

        $data = $this->blogPostRepository->getDynamicIndexContent();
        $data['search_value'] = $search_value;
        $data['search_results'] = $search_results ?? null;

        $this->systemMetadataRepository->formatMetaData(
            "index,follow",
            "Blog",
            "$this->authorDefault",
            "Blog",
            "View all Blog posts"
        );

        if(count($search_results) > 0) {
            return view('frontend.blog.blog_search', $data);
        }

        return view ('frontend.blog.blog_search', $data)->withMessage('No Details found. Try to search again !');
    }
}
