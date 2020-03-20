<li class="nav-item nav-dropdown">
    <a class="nav-link  nav-dropdown-toggle" href="#">
        <i class="fa-fw fas fa-lock-open nav-icon">

        </i>
        {{ trans('cruds.accessControlManagement.title_short') }}
    </a>
    <ul class="nav-dropdown-items">
        @can('permission_access')
            <li class="nav-item">
                <a href="{{ route("admin.permissions.index") }}"
                   class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-unlock-alt nav-icon">

                    </i>
                    {{ trans('cruds.permission.title') }}
                </a>
            </li>
        @endcan
        @can('role_access')
            <li class="nav-item">
                <a href="{{ route("admin.roles.index") }}"
                   class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-briefcase nav-icon">

                    </i>
                    {{ trans('cruds.role.title') }}
                </a>
            </li>
        @endcan
    </ul>
</li>
