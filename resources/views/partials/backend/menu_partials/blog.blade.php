<li class="nav-item nav-dropdown">
    <a class="nav-link  nav-dropdown-toggle" href="#">
        <i class="fa-fw fas fa-list-alt nav-icon">

        </i>
        {{ trans('cruds.blogManagement.title_short') }}
    </a>
    <ul class="nav-dropdown-items">
        @can('blog_post_access')
            <li class="nav-item">
                <a href="{{ route("admin.blog.index") }}"
                   class="nav-link {{ request()->is('admin/blog') || request()->is('admin/blog/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-pencil-square-o nav-icon">

                    </i>
                    {{ trans('cruds.blogPostsManagement.title') }}
                </a>
            </li>
        @endcan
        @can('blog_post_access')
            <li class="nav-item">
                <a href="{{ route("admin.blog.create") }}"
                   class="nav-link {{ request()->is('admin/blog') || request()->is('admin/blog/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-pencil-square-o nav-icon">

                    </i>
                    {{ trans('cruds.blogPost.title_create') }}
                </a>
            </li>
        @endcan

        @can('blog_post_categories_access')
            <li class="nav-item">
                <a href="{{ route("admin.blog.index") }}"
                   class="nav-link {{ request()->is('admin/blog') || request()->is('admin/blog/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-hashtag nav-icon">

                    </i>
                    {{ trans('cruds.blogPostCategoriesManagement.title') }}
                </a>
            </li>
        @endcan
        @can('blog_post_tags_access')
            <li class="nav-item">
                <a href="{{ route("admin.blog.index") }}"
                   class="nav-link {{ request()->is('admin/blog') || request()->is('admin/blog/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-tags nav-icon">

                    </i>
                    {{ trans('cruds.blogPostTagsManagement.title') }}
                </a>
            </li>
        @endcan
        @can('blog_post_images_access')
            <li class="nav-item">
                <a href="{{ route("admin.blog.index") }}"
                   class="nav-link {{ request()->is('admin/blog') || request()->is('admin/blog/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-file-image-o nav-icon">

                    </i>
                    {{ trans('cruds.blogPostImagesManagement.title') }}
                </a>
            </li>
        @endcan
    </ul>
</li>
