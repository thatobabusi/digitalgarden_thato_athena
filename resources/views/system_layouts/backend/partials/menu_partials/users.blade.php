<li class="nav-item nav-dropdown">
    <a class="nav-link  nav-dropdown-toggle" href="#">
        <i class="fa-fw fas fa-users nav-icon">

        </i>
        {{ trans('cruds.userManagement.title_short') }}
    </a>
    <ul class="nav-dropdown-items">
        @can('user_access')
            <li class="nav-item">
                <a href="{{ route("admin.users.index") }}?role=1"
                   class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-user nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.user_types.admin') }}
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route("admin.users.index") }}"
                   class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-user nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.user_types.all_users') }}
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route("admin.users.index") }}?role=2"
                   class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-user nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.user_types.all_other_user') }}
                </a>
            </li>
        @endcan
    </ul>
</li>
