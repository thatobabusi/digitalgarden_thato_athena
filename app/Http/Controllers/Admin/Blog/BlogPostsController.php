<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBlogPostRequest;
use App\Http\Requests\StoreBlogPostRequest;
use App\Http\Requests\UpdateBlogPostRequest;
use App\Models\Blog\BlogPost;
use App\Models\User\User;
use App\Repositories\Blog\BlogPostCategoryRepository;
use App\Repositories\Blog\BlogPostImageRepository;
use App\Repositories\Blog\BlogPostRepository;
use App\Repositories\Blog\BlogPostTagRepository;
use App\Repositories\Blog\BlogRepository;
use App\Repositories\User\UserRepository;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class BlogPostsController
 *
 * @package App\Http\Controllers\Admin\Blog
 */
class BlogPostsController extends Controller
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
     * @var BlogPostImageRepository
     */
    protected $blogPostImageRepository;
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * BlogPostsController constructor.
     *
     * @param BlogRepository             $blogRepository
     * @param BlogPostRepository         $blogPostRepository
     * @param BlogPostCategoryRepository $blogPostCategory
     * @param BlogPostTagRepository      $blogPostTagRepository
     * @param BlogPostImageRepository    $blogPostImageRepository
     */
    public function __construct(
        BlogRepository $blogRepository, BlogPostRepository $blogPostRepository, BlogPostCategoryRepository $blogPostCategory,
        BlogPostTagRepository $blogPostTagRepository, BlogPostImageRepository $blogPostImageRepository, UserRepository $userRepository)
    {
        $this->blogRepository = $blogRepository;
        $this->blogPostRepository = $blogPostRepository;
        $this->blogPostCategory = $blogPostCategory;
        $this->blogPostTagRepository = $blogPostTagRepository;
        $this->blogPostImageRepository = $blogPostImageRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = ['blogPosts' => $this->blogPostRepository->getAllBlogPostsRecords()];

        return view('admin.blog.blogPosts.index', $data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = [];

        return view('admin.blog.blogPosts.create', $data);
    }

    /**
     * @param StoreBlogPostRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreBlogPostRequest $request)
    {
        $this->blogPostRepository->storeNewBlogPostRecord($request);

        return redirect()->route('admin.blog.blogPosts.index');
    }

    /**
     * @param string $blogPostSlug
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(string $blogPostSlug)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $blogPost = $this->blogPostRepository->getBlogPostRecordBySlug($blogPostSlug);

        $blogPost->load('blogPostAuthor', 'blogPostTags', 'blogPostCategory'); //load these relations for use on the blade

        $data = [
                'blogPost' => $blogPost,
                'blogPostsRelatedBlogPostCategoryOrTag' => $this->blogPostRepository->getAllBlogPostsRecordsRelatedToThisBlogPostByCategoryOrTag($blogPost),
                'users' => $this->userRepository->listUsersRecordsByNameAndId(),
                'tags' => $this->blogPostTagRepository->listAllTagsByTitleAndId(),
                'categories' => $this->blogPostCategory->listAllCategoriesByTitleAndId(),
                ];

        return view('admin.blog.blogPosts.edit', $data);
    }

    /**
     * @param UpdateBlogPostRequest $request
     * @param string                $blogPost_id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateBlogPostRequest $request, string $blogPost_id)
    {
        $this->blogPostRepository->updateExistingBlogPostRecord($request,  $blogPost_id);

        return redirect()->route('admin.blog.index');
    }

    /**
     * @param string $blogPostSlug
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(string $blogPostSlug)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $blogPost = $this->blogPostRepository->getBlogPostRecordBySlug($blogPostSlug);

        $data = compact('blogPost');

        return view('admin.blog.blogPosts.show', $data);
    }

    /**
     * @param BlogPost $blogPost
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(BlogPost $blogPost)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $this->blogPostRepository->destroySingleBlogPostRecord($blogPost);

        return back();
    }

    /**
     * @param MassDestroyBlogPostRequest $request
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function massDestroy(MassDestroyBlogPostRequest $request)
    {
        $this->blogPostRepository->massDestroyBlogPostRecords($request);

        return response(null, Response::HTTP_NO_CONTENT);
    }
}