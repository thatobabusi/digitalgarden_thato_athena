<div class="sidebar">
    <nav class="sidebar-nav">

        <ul class="nav">
            <li class="nav-item">
                <a href="{{ route("admin.home") }}" class="nav-link">
                    <i class="nav-icon fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>

            {{--It's obvious a developer can override this code but not the unskilled end-user--}}

            @if(plugin_is_enabled('Access Control Management'))
                @can('access_control_management_access')
                    @include('partials.backend.menu_partials.access_control')
                @endcan
            @endif

            @if(plugin_is_enabled('Activity Log'))
                @can('activity_log_access')
                    @include('partials.backend.menu_partials.activity_log')
                @endcan
            @endif

            @if(plugin_is_enabled('Blog'))
                @can('blog_management_access')
                    @include('partials.backend.menu_partials.blog')
                @endcan
            @endif

            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs nav-icon">

                    </i>
                   Config / CMS
                </a>
                <ul class="nav-dropdown-items">
                    @if(plugin_is_enabled('Menu Manager'))
                        <li class="nav-item">
                            <a href="{{route('admin.system-menu-items.index')}}" class="nav-link {{ request()->is('admin/menu-manager') || request()->is('admin/menu-manager/*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-ban nav-icon">

                                </i>
                                <strike>Menu Manager</strike>
                            </a>
                        </li>
                    @endif

                    @if(plugin_is_enabled('Pages Manager'))
                        <li class="nav-item">
                            <a href="{{route('admin.system-pages.index')}}" class="nav-link {{ request()->is('admin/crud-generator') || request()->is('admin/crud-generator/*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-ban nav-icon">

                                </i>
                                <strike>Pages Manager</strike>
                            </a>
                        </li>
                    @endif

                    @if(plugin_is_enabled('Pages Manager'))
                        <li class="nav-item">
                            <a href="{{route('admin.system-config-plugins.index')}}" class="nav-link {{ request()->is('admin/crud-generator') || request()->is('admin/crud-generator/*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-ban nav-icon">

                                </i>
                                <strike>Plugins Manager</strike>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>

            @if(plugin_is_enabled('Developer Tools'))
                @can('developer_tools_access')
                    @include('partials.backend.menu_partials.developertools')
                @endcan
            @endif

            @if(plugin_is_enabled('User Management'))
                @can('user_management_access')
                    @include('partials.backend.menu_partials.uploads')
                @endcan
            @endif

            @if(plugin_is_enabled('User Management'))
                @can('user_management_access')
                    @include('partials.backend.menu_partials.users')
                @endcan
            @endif

            <li class="nav-item">
                <a href="/" class="nav-link">
                    <i class="fa-fw fas fa-globe nav-icon">

                    </i>
                    Site Frontend
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>

    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
