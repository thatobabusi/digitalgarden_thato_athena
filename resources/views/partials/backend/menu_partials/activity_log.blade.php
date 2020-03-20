<li class="nav-item">
    <a href="{{route('admin.activity.index')}}" class="nav-link {{ request()->is('admin/activity') || request()->is('admin/activity/*') ? 'active' : '' }}">
        <i class="fa-fw fas fa-history nav-icon">

        </i>
        Activity Log
    </a>
</li>
