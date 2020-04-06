<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBlogPostRequest;
use App\Http\Requests\StoreBlogPostRequest;
use App\Http\Requests\UpdateBlogPostRequest;
use App\Models\Blog\BlogPost;
use App\Models\User\User;
use App\Repositories\Image\ImageRepository;
use RealRashid\SweetAlert\Facades\Alert;
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
     * @param BlogRepository             $blogRepository
     * @param BlogPostRepository         $blogPostRepository
     * @param BlogPostCategoryRepository $blogPostCategory
     * @param BlogPostTagRepository      $blogPostTagRepository
     * @param BlogPostImageRepository    $blogPostImageRepository
     * @param UserRepository             $userRepository
     * @param ImageRepository            $imageRepository
     */
    public function __construct(
        BlogRepository $blogRepository, BlogPostRepository $blogPostRepository, BlogPostCategoryRepository $blogPostCategory,
        BlogPostTagRepository $blogPostTagRepository, BlogPostImageRepository $blogPostImageRepository,
        UserRepository $userRepository, ImageRepository $imageRepository)
    {
        $this->blogRepository = $blogRepository;
        $this->blogPostRepository = $blogPostRepository;
        $this->blogPostCategory = $blogPostCategory;
        $this->blogPostTagRepository = $blogPostTagRepository;
        $this->blogPostImageRepository = $blogPostImageRepository;
        $this->imageRepository = $imageRepository;
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

        return view('admin.blog.blog_posts.index', $data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreBlogPostRequest $request)
    {
        $new_image = $this->imageRepository->uploadImage($request->upload, 'blog_post_images');

        $this->blogPostRepository->storeNewBlogPostRecord($request, [$new_image->id]);

        alert()->success('Success','Blog Post Created Successfully')->timerProgressBar();

        return redirect()->route('admin.blog.index');
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateBlogPostRequest $request, string $blog_post_id)
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(string $blog_post_id)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $this->blogPostRepository->destroySingleBlogPostRecord($blog_post_id);

        alert()->success('Success','Blog Post Deleted Successfully')->timerProgressBar();

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

        alert()->success('Success','Blog Posts Deleted Successfully')->timerProgressBar();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
