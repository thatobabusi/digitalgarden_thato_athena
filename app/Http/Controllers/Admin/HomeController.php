<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\AccessControl\PermissionRepository;
use App\Repositories\AccessControl\RoleRepository;
use App\Repositories\Blog\BlogPostCategoryRepository;
use App\Repositories\Blog\BlogPostImageRepository;
use App\Repositories\Blog\BlogPostRepository;
use App\Repositories\Blog\BlogPostTagRepository;
use App\Repositories\Blog\BlogRepository;
use App\Repositories\User\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Activitylog\Models\Activity;

/**
 * Class HomeController
 *
 * @package App\Http\Controllers\Admin
 */
class HomeController
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

    public function __construct(
        BlogRepository $blogRepository, BlogPostRepository $blogPostRepository, BlogPostCategoryRepository $blogPostCategory,
        BlogPostTagRepository $blogPostTagRepository, BlogPostImageRepository $blogPostImageRepository,
        PermissionRepository $permissionRepository, RoleRepository $roleRepository, UserRepository $userRepository)
    {
        $this->blogRepository = $blogRepository;
        $this->blogPostRepository = $blogPostRepository;
        $this->blogPostCategory = $blogPostCategory;
        $this->blogPostTagRepository = $blogPostTagRepository;
        $this->blogPostImageRepository = $blogPostImageRepository;
        $this->permissionRepository = $permissionRepository;
        $this->roleRepository = $roleRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        if( Str::contains(URL::previous(), 'login') === true ) {

            $user_roles = '';
            foreach(Auth::user()->roles()->get() as $role) {
                $user_roles .= $role->title . ' |';
            }
            $user_roles = substr($user_roles, 0, -2);

            alert()->success('Welcome Back, ' . Auth::user()->getFullName(), 'Logged in as ' .  $user_roles)->timerProgressBar();

        }


        $data = [
            'blogPostsCountTotal' => $this->blogPostRepository->getBlogPostCountByCriteria(),
            'blogPostsCountNew' => $this->blogPostRepository->getBlogPostCountByCriteria("blog_post_status_id", "1"),
            'blogPostsCountDrafts' => $this->blogPostRepository->getBlogPostCountByCriteria("blog_post_status_id", "2"),
            'blogPostsCountPendingProofReading' => $this->blogPostRepository->getBlogPostCountByCriteria("blog_post_status_id", "3"),
            'blogPostsCountApproved' => $this->blogPostRepository->getBlogPostCountByCriteria("blog_post_status_id", "4"),
            'blogPostsCountRejected' => $this->blogPostRepository->getBlogPostCountByCriteria("blog_post_status_id", "5"),
            'blogPostsCountPublished' => $this->blogPostRepository->getBlogPostCountByCriteria("blog_post_status_id", "6"),

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
