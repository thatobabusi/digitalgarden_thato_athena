<?php

namespace App\Http\Controllers\Backend\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBlogPostRequest;
use App\Http\Requests\StoreBlogPostRequest;
use App\Http\Requests\UpdateBlogPostRequest;
use App\Repositories\Image\ImageRepository;
use App\Repositories\Blog\BlogPostCategoryRepository;
use App\Repositories\Blog\BlogPostRepository;
use App\Repositories\Blog\BlogPostTagRepository;
use App\Repositories\User\UserRepository;
use Exception;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\Activitylog\Models\Activity;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\DataTables;

/**
 * Class BlogPostsController
 *
 * @package App\Http\Controllers\Backend\Admin\Blog
 */
class BlogPostsController extends Controller
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
     * BlogPostsController constructor.
     *
     * @param BlogPostRepository         $blogPostRepository
     * @param BlogPostCategoryRepository $blogPostCategory
     * @param BlogPostTagRepository      $blogPostTagRepository
     * @param UserRepository             $userRepository
     * @param ImageRepository            $imageRepository
     */
    public function __construct(BlogPostRepository $blogPostRepository, BlogPostCategoryRepository $blogPostCategory,
        BlogPostTagRepository $blogPostTagRepository, UserRepository $userRepository, ImageRepository $imageRepository)
    {
        $this->blogPostRepository = $blogPostRepository;
        $this->blogPostCategory = $blogPostCategory;
        $this->blogPostTagRepository = $blogPostTagRepository;
        $this->imageRepository = $imageRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * @return mixed
     * @throws Exception
     */
    public function getAllForDatatableByAjax()
    {
        $data = $this->blogPostRepository->getAllBlogPostsRecords();

        return Datatables::of($data)->make(true);
    }

    /**
     * @param Request $request
     *
     * @return Factory|View
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        /*
        TODO::We will use the ajax datables later, causing too much confusion now
        $dataTable = $this->getAllForDatatableByAjax();
        $data = ['dataTable'=>$dataTable];
        */

        $data = ['blogPosts' => $this->blogPostRepository->getAllBlogPostsRecords()];

        return view('admin.blog.blog_posts.index', $data);
    }

    /**
     * @return Factory|View
     */
    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = [
            'users' => $this->userRepository->listUsersRecordsByNameAndId(),
            'tags' => $this->blogPostTagRepository->listAllTagsByTitleAndId(),
            'categories' => $this->blogPostCategory->listAllCategoriesByTitleAndId(),
            'statusses' => $this->blogPostRepository->listAllStatussesByTitleAndId(),
        ];

        return view('admin.blog.blog_posts.create', $data);
    }

    /**
     * @param StoreBlogPostRequest $request
     *
     * @return RedirectResponse
     */
    public function store(StoreBlogPostRequest $request)
    {
        $new_image = $this->imageRepository->uploadImage($request->upload, 'blog_post_images');

        $blogPost = $this->blogPostRepository->storeNewBlogPostRecord($request, [$new_image->id]);

        if($blogPost) {
            alert()->success('Success', 'Blog Post Created Successfully')->timerProgressBar();
        }

        return redirect()->route('admin.blog.index');
    }

    /**
     * @param string $blogPostSlug
     *
     * @return Factory|View
     */
    public function edit(string $blogPostSlug)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $blogPost = $this->blogPostRepository->getBlogPostRecordBySlug($blogPostSlug);

        $blogPost->load('blogPostAuthor', 'blogPostCategory', 'blogPostImages', 'blogPostStatus', 'blogPostTags'); //load these relations for use on the blade

        $data = [
                'blogPost' => $blogPost,
                'blogPostImage' => $blogPost->blogPostImages->first(),
                'blogPostsRelatedBlogPostCategoryOrTag' => $this->blogPostRepository->getAllBlogPostsRecordsRelatedToThisBlogPostByCategoryOrTag($blogPost, "10"),
                'users' => $this->userRepository->listUsersRecordsByNameAndId(),
                'tags' => $this->blogPostTagRepository->listAllTagsByTitleAndId(),
                'categories' => $this->blogPostCategory->listAllCategoriesByTitleAndId(),
                'statusses' => $this->blogPostRepository->listAllStatussesByTitleAndId(),
                ];

        return view('admin.blog.blog_posts.edit', $data);
    }

    /**
     * @param UpdateBlogPostRequest $request
     * @param string                $blog_post_id
     *
     * @return RedirectResponse
     * @throws Exception
     */
    public function update(UpdateBlogPostRequest $request, string $blog_post_id): RedirectResponse
    {
        $new_image = null;
        $old_image = null;

        #There are new files present therefore re-upload image file
        if(!empty($request->upload)) {

            $blogPost = $this->blogPostRepository->getBlogPostRecordById($blog_post_id);

            if(count( $blogPost->blogPostImages()->get()) > 0) {

                $old_image = $blogPost->blogPostImages()->first();

                #Detatch the images associated with this blog post
                $blogPost->blogPostImages()->detach();

                #Delete the old image
                $this->imageRepository->deleteUploadedImage($old_image);
            }

            #Upload the new image
            $new_image = $this->imageRepository->uploadImage($request->upload, 'blog_post_images');
        }

        $blogPost = $this->blogPostRepository->updateExistingBlogPostRecord($request,  $blog_post_id);

        if($new_image) {
            $blogPost->blogPostImages()->sync([$new_image->id]);
        }

        alert()->success('Success','Blog Post Updated Successfully')->timerProgressBar();

        return redirect()->route('admin.blog.index');
    }

    /**
     * @param string $blogPostSlug
     *
     * @return Factory|View
     */
    public function show(string $blogPostSlug)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $blogPost = $this->blogPostRepository->getBlogPostRecordBySlug($blogPostSlug);

        $blogPost->load('blogPostAuthor', 'blogPostCategory', 'blogPostImages', 'blogPostTags');

        $data = ['blogPost' => $blogPost, 'blogPostImage' => $blogPost->blogPostImages->first()];

        return view('admin.blog.blog_posts.show', $data);
    }

    /**
     * @param string $blog_post_id
     *
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(string $blog_post_id): RedirectResponse
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $this->blogPostRepository->destroySingleBlogPostRecord($blog_post_id);

        alert()->success('Success','Blog Post Deleted Successfully')->timerProgressBar();

        return back();
    }

    /**
     * @param MassDestroyBlogPostRequest $request
     *
     * @return ResponseFactory|\Illuminate\Http\Response
     */
    public function massDestroy(MassDestroyBlogPostRequest $request)
    {
        $this->blogPostRepository->massDestroyBlogPostRecords($request);

        alert()->success('Success','Blog Posts Deleted Successfully')->timerProgressBar();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
