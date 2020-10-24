<?php

namespace App\Providers;

use App\Repositories\AccessControl\PermissionRepository;
use App\Repositories\AccessControl\PermissionRepositoryInterface;
use App\Repositories\AccessControl\RoleRepository;
use App\Repositories\AccessControl\RoleRepositoryInterface;
use App\Repositories\Blog\BlogPostCategoryRepository;
use App\Repositories\Blog\BlogPostCategoryRepositoryInterface;
use App\Repositories\Blog\BlogPostRepository;
use App\Repositories\Blog\BlogPostRepositoryInterface;
use App\Repositories\Blog\BlogPostTagRepository;
use App\Repositories\Blog\BlogPostTagRepositoryInterface;
use App\Repositories\System\SystemConfigPluginRepository;
use App\Repositories\System\SystemConfigPluginRepositoryInterface;
use App\Repositories\System\SystemEmailRepository;
use App\Repositories\System\SystemEmailRepositoryInterface;
use App\Repositories\System\SystemImageRepository;
use App\Repositories\System\SystemImageRepositoryInterface;
use App\Repositories\System\SystemMenuItemRepository;
use App\Repositories\System\SystemMenuItemRepositoryInterface;
use App\Repositories\System\SystemMetaRepository;
use App\Repositories\System\SystemMetaRepositoryInterface;
use App\Repositories\System\SystemPageRepository;
use App\Repositories\System\SystemPageRepositoryInterface;
use App\Repositories\System\SystemPageSectionRepository;
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
        $this->app->bind(BlogPostRepositoryInterface::class, BlogPostRepository::class);
        $this->app->bind(BlogPostCategoryRepositoryInterface::class, BlogPostCategoryRepository::class);
        $this->app->bind(BlogPostTagRepositoryInterface::class, BlogPostTagRepository::class);

        $this->app->bind(PermissionRepositoryInterface::class, PermissionRepository::class);
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);

        $this->app->bind(SystemConfigPluginRepositoryInterface::class, SystemConfigPluginRepository::class);
        $this->app->bind(SystemEmailRepositoryInterface::class, SystemEmailRepository::class);
        $this->app->bind(SystemImageRepositoryInterface::class, SystemImageRepository::class);
        $this->app->bind(SystemMenuItemRepositoryInterface::class, SystemMenuItemRepository::class);
        $this->app->bind(SystemMetaRepositoryInterface::class, SystemMetaRepository::class);
        $this->app->bind(SystemPageRepositoryInterface::class, SystemPageRepository::class);
        $this->app->bind(SystemPageSectionRepository::class, SystemPageSectionRepository::class);

    }

}
