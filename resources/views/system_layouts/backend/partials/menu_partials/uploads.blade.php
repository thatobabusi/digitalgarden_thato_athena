<li class="nav-item nav-dropdown">
    <a class="nav-link  nav-dropdown-toggle" href="#">
        <i class="fa fa-upload nav-icon">

        </i>
        {{--{{ trans('cruds.userManagement.title_short') }}--}}
        File Uploads
    </a>
    <ul class="nav-dropdown-items">
        @can('user_access')
            <li class="nav-item">
                <a href="{{ route("admin.upload.index") }}"
                   class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-user nav-icon">

                    </i>
                    Manage Uploads
                    {{--{{ trans('cruds.userManagement.user_types.admin') }}--}}
                </a>
            </li>
        @endcan
    </ul>
</li>
