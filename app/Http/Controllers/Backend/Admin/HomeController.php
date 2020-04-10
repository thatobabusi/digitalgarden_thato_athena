<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Repositories\AccessControl\PermissionRepository;
use App\Repositories\AccessControl\RoleRepository;
use App\Repositories\Blog\BlogPostCategoryRepository;
use App\Repositories\Blog\BlogPostRepository;
use App\Repositories\Blog\BlogPostTagRepository;
use App\Repositories\Image\ImageRepository;
use App\Repositories\User\UserRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Spatie\Activitylog\Models\Activity;

/**
 * Class HomeController
 *
 * @package App\Http\Controllers\Backend\Admin
 */
class HomeController
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
     * @var PermissionRepository
     */
    protected $permissionRepository;
    /**
     * @var RoleRepository
     */
    protected $roleRepository;

    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * HomeController constructor.
     *
     * @param BlogPostRepository         $blogPostRepository
     * @param BlogPostCategoryRepository $blogPostCategory
     * @param BlogPostTagRepository      $blogPostTagRepository
     * @param ImageRepository            $imageRepository
     * @param PermissionRepository       $permissionRepository
     * @param RoleRepository             $roleRepository
     * @param UserRepository             $userRepository
     */
    public function __construct(BlogPostRepository $blogPostRepository, BlogPostCategoryRepository $blogPostCategory,
        BlogPostTagRepository $blogPostTagRepository, ImageRepository $imageRepository,
        PermissionRepository $permissionRepository, RoleRepository $roleRepository, UserRepository $userRepository)
    {
        $this->blogPostRepository = $blogPostRepository;
        $this->blogPostCategory = $blogPostCategory;
        $this->blogPostTagRepository = $blogPostTagRepository;
        $this->imageRepository = $imageRepository;
        $this->permissionRepository = $permissionRepository;
        $this->roleRepository = $roleRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * @return Factory|View
     */
    public function index()
    {

        if( Str::contains(URL::previous(), 'login') === true ) {

            $user_roles = '';
            if(Auth::user()) {
                foreach (Auth::user()->roles()->get() as $role) {
                    $user_roles .= $role->title . ' |';
                }
                $user_roles = substr($user_roles, 0, -2);

                alert()->success('Welcome Back, ' . Auth::user()->getFullName(),
                    'Logged in as ' . $user_roles)->timerProgressBar();
            }
        }


        $data = [
            'blogPostsCountTotal' => $this->blogPostRepository->getBlogPostCountByCriteria(),
            'blogPostsCountNew' => $this->blogPostRepository->getBlogPostCountByCriteria('blog_post_status_id', '1'),
            'blogPostsCountDrafts' => $this->blogPostRepository->getBlogPostCountByCriteria('blog_post_status_id', '2'),
            'blogPostsCountPendingProofReading' => $this->blogPostRepository->getBlogPostCountByCriteria('blog_post_status_id', '3'),
            'blogPostsCountApproved' => $this->blogPostRepository->getBlogPostCountByCriteria('blog_post_status_id', '4'),
            'blogPostsCountRejected' => $this->blogPostRepository->getBlogPostCountByCriteria('blog_post_status_id', '5'),
            'blogPostsCountPublished' => $this->blogPostRepository->getBlogPostCountByCriteria('blog_post_status_id', '6'),

            'usersCountTotal' => $this->userRepository->getUserCountByCriteria(),
            'permissionsCountTotal' => $this->permissionRepository->getPermissionsCountByCriteria(),
            'rolesCountTotal' => $this->roleRepository->getRolesCountByCriteria(),
            'activityCountTotal' => Activity::all()->count(),

            'categories' => $this->blogPostCategory->listAllCategoriesByTitleAndId(),
            'tags' => $this->blogPostTagRepository->listAllTagsByTitleAndId(),
        ];

        return view('home', $data);
    }

}
