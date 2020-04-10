<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogPostRequest;
use App\Http\Requests\UpdateBlogPostRequest;
use App\Repositories\Blog\BlogPostCategoryRepository;
use App\Repositories\Blog\BlogPostRepository;
use App\Repositories\Blog\BlogPostTagRepository;
use App\Repositories\Image\ImageRepository;
use App\Repositories\User\UserRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json([
            'error' => false,
            'blogPosts'  => $this->blogPostRepository->getAllBlogPostsRecords(),
        ], 200);
    }

    /**
     * @param StoreBlogPostRequest $request
     *
     * @return JsonResponse
     */
    public function store(StoreBlogPostRequest $request): JsonResponse
    {
        $new_image = $this->imageRepository->uploadImage($request->upload, 'blog_post_images');

        $blogPost = $this->blogPostRepository->storeNewBlogPostRecord($request, [$new_image->id]);

        if($blogPost) {
            return response()->json([
                'error' => false,
                'blogPost'  => $blogPost,
            ], 200);
        }

        return response()->json([
            'error' => true,
            'blogPost'  => null,
            'messages'  => 'did not save blog post'
        ], 200);
    }

    /**
     * @param string $blogPostSlug
     *
     * @return JsonResponse
     */
    public function show(string $blogPostSlug): JsonResponse
    {
        $blogPost = $this->blogPostRepository->getBlogPostRecordBySlug($blogPostSlug);
        $blogPost->load('blogPostAuthor', 'blogPostCategory', 'blogPostImages', 'blogPostTags');

        if($blogPost === null){
            return response()->json([
                'error' => true,
                'message'  => "Record with slug # $blogPostSlug not found",
            ], 404);
        }

        return response()->json([
            'error' => false,
            'blogPost'  => $blogPost,
            'blogPostAuthor'  => $blogPost->blogPostAuthor,
            'blogPostCategory'  => $blogPost->blogPostCategory,
            'blogPostImage'  => $blogPost->blogPostImages->first(),
            'blogPostTags'  => $blogPost->blogPostTags,
        ], 200);
    }

    /**
     * @param UpdateBlogPostRequest $request
     * @param string                $blog_post_id
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function update(UpdateBlogPostRequest $request, string $blog_post_id): JsonResponse
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

        if($blogPost) {
            return response()->json([
                'error' => false,
                'blogPost'  => $blogPost,
            ], 200);
        }

        return response()->json([
            'error' => true,
            'blogPost'  => null,
            'messages'  => 'did not update blog post'
        ], 200);
    }

    /**
     * @param string $blog_post_id
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(string $blog_post_id): JsonResponse
    {
        $blogPost = $this->blogPostRepository->getBlogPostRecordById($blog_post_id);

        if($blogPost === null){
            return response()->json([
                'error' => true,
                'message'  => "Record with id # $blog_post_id not found",
            ], 404);
        }

        $blogPost->delete();

        return response()->json([
            'error' => false,
            'message'  => "Employee record successfully deleted id # $blog_post_id",
        ], 200);
    }
}
