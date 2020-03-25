<li class="nav-item nav-dropdown">
    <a class="nav-link  nav-dropdown-toggle" href="#">
        <i class="fa-fw fas fa-desktop nav-icon">

        </i>
        {{ trans('cruds.developerTools.title') }}
    </a>
    <ul class="nav-dropdown-items">

        {{--@if(plugin_is_enabled('Config Settings'))
            <li class="nav-item">
                <a href="#" class="nav-link {{ request()->is('admin/config-setting') || request()->is('admin/config-setting/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-ban nav-icon">

                    </i>
                    <strike>Config</strike>
                </a>
            </li>
        @endif--}}

        {{--@if(plugin_is_enabled('Code Editor'))
            <li class="nav-item">
                <a href="#" class="nav-link {{ request()->is('admin/code-editor') || request()->is('admin/code-editor/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-ban nav-icon">

                    </i>
                    <strike>Code Editor</strike>
                </a>
            </li>
        @endif--}}

        {{--@if(plugin_is_enabled('CRUD Generator'))
            <li class="nav-item">
                <a href="#" class="nav-link {{ request()->is('admin/crud-generator') || request()->is('admin/crud-generator/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-ban nav-icon">

                    </i>
                    <strike>CRUD Generator</strike>
                </a>
            </li>
        @endif--}}

        @if(plugin_is_enabled('Log Viewer'))
            <li class="nav-item">
                <a href="/admin/developer-tools/log-viewer" class="nav-link {{ request()->is('admin/log-viewer') || request()->is('admin/log-viewer/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-book nav-icon">

                    </i>
                    Log Viewer
                </a>
            </li>
        @endif

        @if(plugin_is_enabled('Migration Manager'))
            <li class="nav-item">
                <a href="/admin/developer-tools/migrations" class="nav-link {{ request()->is('admin/migrations') || request()->is('admin/migrations/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-database nav-icon">

                    </i>
                    Migration Manager
                </a>
            </li>
        @endif

        {{--@if(plugin_is_enabled('Module Manager'))
            <li class="nav-item">
                <a href="#" class="nav-link {{ request()->is('admin/module-manager') || request()->is('admin/module-manager/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-ban nav-icon">

                    </i>
                    <strike>Modules</strike>
                </a>
            </li>
        @endif--}}

        {{--@if(plugin_is_enabled('Pages Manager'))
            <li class="nav-item">
                <a href="#" class="nav-link {{ request()->is('admin/crud-generator') || request()->is('admin/crud-generator/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-ban nav-icon">

                    </i>
                    <strike>Pages Manager</strike>
                </a>
            </li>
        @endif--}}

        @if(plugin_is_enabled('Route Browser'))
            <li class="nav-item">
                <a href="/admin/developer-tools/routes" class="nav-link {{ request()->is('admin/routes') || request()->is('admin/routes/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-route nav-icon">

                    </i>
                    Route Browser
                </a>
            </li>
        @endif

        @if(plugin_is_enabled('Telescope'))
            <li class="nav-item">
                <a href="/admin/developer-tools/telescope" class="nav-link {{ request()->is('admin/developer-tools/terminal') || request()->is('admin/developer-tools/terminal/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fas fa-user-secret nav-icon">

                    </i>
                    Telescope
                </a>
            </li>
        @endif

        @if(plugin_is_enabled('Terminal'))
            <li class="nav-item">
                <a href="/admin/developer-tools/terminal" class="nav-link {{ request()->is('admin/developer-tools/terminal') || request()->is('admin/developer-tools/terminal/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-laptop-code nav-icon">

                    </i>
                    Terminal
                </a>
            </li>
        @endif

        {{--@if(plugin_is_enabled('Uploads Manager'))
            <li class="nav-item">
                <a href="#" class="nav-link {{ request()->is('admin/uploads-manager') || request()->is('admin/uploads-manager/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-ban nav-icon">

                    </i>
                    <strike>Uploads</strike>
                </a>
            </li>
        @endif--}}

    </ul>
</li>
