<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBlogPostTagRequest;
use App\Http\Requests\StoreBlogPostTagRequest;
use App\Http\Requests\UpdateBlogPostTagRequest;
use App\Repositories\Blog\BlogPostCategoryRepository;
use App\Repositories\Blog\BlogPostImageRepository;
use App\Repositories\Blog\BlogPostRepository;
use App\Repositories\Blog\BlogPostTagRepository;
use App\Repositories\Blog\BlogRepository;
use App\Repositories\Image\ImageRepository;
use App\Repositories\User\UserRepository;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class BlogPostTagsController
 *
 * @package App\Http\Controllers\Admin\Blog
 */
class BlogPostTagsController extends Controller
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
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * BlogPostTagsController constructor.
     *
     * @param BlogPostRepository         $blogPostRepository
     * @param BlogPostCategoryRepository $blogPostCategory
     * @param BlogPostTagRepository      $blogPostTagRepository
     * @param ImageRepository            $imageRepository
     * @param UserRepository             $userRepository
     */
    public function __construct(BlogPostRepository $blogPostRepository, BlogPostCategoryRepository $blogPostCategory,
        BlogPostTagRepository $blogPostTagRepository, ImageRepository $imageRepository, UserRepository $userRepository)
    {
        $this->blogPostRepository = $blogPostRepository;
        $this->blogPostCategory = $blogPostCategory;
        $this->blogPostTagRepository = $blogPostTagRepository;
        $this->imageRepository = $imageRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = ['blogPostTags' => $this->blogPostTagRepository->getAllTags()];

        return view('admin.blog.blog_post_tags.index', $data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = [];

        return view('admin.blog.blog_post_tags.create', $data);
    }

    /**
     * @param StoreBlogPostTagRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreBlogPostTagRequest $request)
    {
        $this->blogPostTagRepository->storeNewBlogPostTagRecord($request);

        alert()->success('Success','Blog Post Tag Created Successfully')->timerProgressBar();

        return redirect()->route('admin.blog-tag.index');
    }

    /**
     * @param string $blogPostTagSlug
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(string $blogPostTagSlug)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = ['blogPostTag' => $this->blogPostTagRepository->getBlogPostTagRecordBySlug($blogPostTagSlug)];

        return view('admin.blog.blog_post_tags.show', $data);
    }

    /**
     * @param string $blogPostTagSlug
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(string $blogPostTagSlug)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = ['blogPostTag' => $this->blogPostTagRepository->getBlogPostTagRecordBySlug($blogPostTagSlug)];

        return view('admin.blog.blog_post_tags.edit', $data);
    }

    /**
     * @param UpdateBlogPostTagRequest $request
     * @param string                   $blogPostTag_id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateBlogPostTagRequest $request, string $blogPostTag_id)
    {
        $this->blogPostTagRepository->updateExistingBlogPostTagRecord($request,  $blogPostTag_id);

        alert()->success('Success','Blog Post Tag Updated Successfully')->timerProgressBar();

        return redirect()->route('admin.blog-tag.index');
    }

    /**
     * @param string $blog_post_tag_id
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(string $blog_post_tag_id)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $this->blogPostTagRepository->destroySingleBlogPostTagRecord($blog_post_tag_id);

        alert()->success('Success','Blog Post Tag Deleted Successfully')->timerProgressBar();

        return back();
    }

    /**
     * @param MassDestroyBlogPostTagRequest $request
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function massDestroy(MassDestroyBlogPostTagRequest $request)
    {
        $this->blogPostTagRepository->massDestroyBlogPostTagRecords($request);

        alert()->success('Success','Blog Post Tags Deleted Successfully')->timerProgressBar();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
