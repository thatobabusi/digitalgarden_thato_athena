<?php

namespace App\Http\Controllers\Backend\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBlogPostCategoryRequest;
use App\Http\Requests\StoreBlogPostCategoryRequest;
use App\Http\Requests\UpdateBlogPostCategoryRequest;
use App\Repositories\Blog\BlogPostCategoryRepository;
use App\Repositories\Blog\BlogPostRepository;
use App\Repositories\Blog\BlogPostTagRepository;
use App\Repositories\System\SystemImageRepository;
use App\Repositories\User\UserRepository;
use Exception;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class BlogPostCategoriesController
 *
 * @package App\Http\Controllers\Backend\Admin\Blog
 */
class BlogPostCategoriesController extends Controller
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
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * BlogPostCategoriesController constructor.
     *
     * @param BlogPostRepository         $blogPostRepository
     * @param BlogPostCategoryRepository $blogPostCategory
     * @param BlogPostTagRepository      $blogPostTagRepository
     * @param SystemImageRepository      $systemImageRepository
     * @param UserRepository             $userRepository
     */
    public function __construct(
        BlogPostRepository $blogPostRepository, BlogPostCategoryRepository $blogPostCategory,
        BlogPostTagRepository $blogPostTagRepository, SystemImageRepository $systemImageRepository,  UserRepository $userRepository)
    {
        $this->blogPostRepository = $blogPostRepository;
        $this->blogPostCategory = $blogPostCategory;
        $this->blogPostTagRepository = $blogPostTagRepository;
        $this->systemImageRepository = $systemImageRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * @return Factory|View
     */
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = ['blogPostCategories' => $this->blogPostCategory->getAllCategories()];

        return view('admin.blog.blog_post_categories.index', $data);
    }

    /**
     * @return Factory|View
     */
    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = [];

        return view('admin.blog.blog_post_categories.create', $data);
    }

    /**
     * @param StoreBlogPostCategoryRequest $request
     *
     * @return RedirectResponse
     */
    public function store(StoreBlogPostCategoryRequest $request): RedirectResponse
    {
        $this->blogPostCategory->storeNewBlogPostCategoryRecord($request);

        alert()->success('Success','Blog Post Category Created Successfully')->timerProgressBar();

        return redirect()->route('admin.blog-category.index');
    }

    /**
     * @param string $blogPostCategorySlug
     *
     * @return Factory|View
     */
    public function show(string $blogPostCategorySlug)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = ['blogPostCategory' => $this->blogPostCategory->getBlogPostCategoryRecordBySlug($blogPostCategorySlug)];

        return view('admin.blog.blog_post_categories.show', $data);
    }

    /**
     * @param string $blogPostCategorySlug
     *
     * @return Factory|View
     */
    public function edit(string $blogPostCategorySlug)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $blogPostCategory = $this->blogPostCategory->getBlogPostCategoryRecordBySlug($blogPostCategorySlug);

        $blogPostCategory->load('blogPosts'); //load these relations for use on the blade

        $data = ['blogPostCategory' => $blogPostCategory];

        return view('admin.blog.blog_post_categories.edit', $data);
    }

    /**
     * @param UpdateBlogPostCategoryRequest $request
     * @param string                        $blogPostCategory_id
     *
     * @return RedirectResponse
     */
    public function update(UpdateBlogPostCategoryRequest $request, string $blogPostCategory_id): RedirectResponse
    {
        $this->blogPostCategory->updateExistingBlogPostCategoryRecord($request,  $blogPostCategory_id);

        alert()->success('Success','Blog Post Category Updated Successfully')->timerProgressBar();

        return redirect()->route('admin.blog-category.index');
    }

    /**
     * @param string $blog_post_category_id
     *
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(string $blog_post_category_id): RedirectResponse
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $this->blogPostCategory->destroySingleBlogPostCategoryRecord($blog_post_category_id);

        alert()->success('Success','Blog Post Category Deleted Successfully')->timerProgressBar();

        return back();
    }

    /**
     * @param MassDestroyBlogPostCategoryRequest $request
     *
     * @return ResponseFactory|\Illuminate\Http\Response
     */
    public function massDestroy(MassDestroyBlogPostCategoryRequest $request)
    {
        $this->blogPostCategory->massDestroyBlogPostCategoryRecords($request);

        alert()->success('Success','Blog Post Categories Deleted Successfully')->timerProgressBar();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
