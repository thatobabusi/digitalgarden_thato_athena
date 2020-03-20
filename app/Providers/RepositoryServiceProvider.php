<?php

namespace App\Providers;

use App\Repositories\AccessControl\PermissionRepository;
use App\Repositories\AccessControl\PermissionRepositoryInterface;
use App\Repositories\AccessControl\RoleRepository;
use App\Repositories\AccessControl\RoleRepositoryInterface;
use App\Repositories\Blog\BlogPostCategoryRepository;
use App\Repositories\Blog\BlogPostCategoryRepositoryInterface;
use App\Repositories\Blog\BlogPostImageRepository;
use App\Repositories\Blog\BlogPostImageRepositoryInterface;
use App\Repositories\Blog\BlogPostRepository;
use App\Repositories\Blog\BlogPostRepositoryInterface;
use App\Repositories\Blog\BlogPostTagRepository;
use App\Repositories\Blog\BlogPostTagRepositoryInterface;
use App\Repositories\Blog\BlogRepository;
use App\Repositories\Blog\BlogRepositoryInterface;

use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryInterface;

use Illuminate\Support\ServiceProvider;

/**
 * Class RepositoryServiceProvider
 *
 * @package App\Providers
 */
class RepositoryServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BlogRepositoryInterface::class, BlogRepository::class);
        $this->app->bind(BlogPostRepositoryInterface::class, BlogPostRepository::class);
        $this->app->bind(BlogPostCategoryRepositoryInterface::class, BlogPostCategoryRepository::class);
        $this->app->bind(BlogPostImageRepositoryInterface::class, BlogPostImageRepository::class);
        $this->app->bind(BlogPostTagRepositoryInterface::class, BlogPostTagRepository::class);

        $this->app->bind(PermissionRepositoryInterface::class, PermissionRepository::class);
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);

        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }

}
