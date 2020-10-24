<nav class="navbar navbar-expand-lg navbar-light fixed-top bg-white custom-menu">
    <div class="container">
        <a class="navbar-brand" href="{{route('frontend.home')}}">
            {{config('app.name')}}
        </a>

        <button class="navbar-toggler navbar-toggler-right" type="button"
                data-toggle="collapse" data-target="#navbar-toggle"
                aria-controls="navbar-toggle" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button><!-- / navbar-toggler -->

        <div class="collapse navbar-collapse" id="navbar-toggle">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('frontend.home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('professional.about-me') }}">About</a>
                </li>

                <?php $cms_pages = get_all_system_pages(); ?>

                @foreach($cms_pages as $cms_page)
                    <li class="nav-item">
                        <a class="nav-link" href="{{$cms_page->slug}}">{{$cms_page->title}}</a>
                    </li>
                @endforeach

                <?php
                $main_nagivation_menu_items = get_all_frontend_system_menu_items();

                foreach($main_nagivation_menu_items as $menu_item) {
                    $dropdown_toggle = true;
                    $dropdown = true;

                    $is_active = $menu_item['is_active'] ?? null;
                    $title = $menu_item['title'] ?? null;
                    $url_link = $menu_item['url_link'] ?? null;
                    $route = $menu_item['route'] ?? null;
                    $icon = "fa fa-angle-down" ?? null;
                    $permissions = $menu_item['permissions'] ?? null;
                    $has_children = $menu_item['has_children'] ?? null;
                    $children = $menu_item['children'] ?? null;
                ?>
                    @if($menu_item['has_children'] === 'blog_post_categories')

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#x" id="dropdown2" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                {{$title}}
                            </a>
                            <div class="dropdown-menu animated zoomIn fast" aria-labelledby="dropdown2">
                                <a class="dropdown-item" href="{{$url_link}}">All Blog Posts</a>
                                <a class="dropdown-item active" href="{{$url_link}}">Blog Posts by Category</a>
                                <div class="dropdown-divider"></div>
                                @foreach($blogPostCategories as $category)
                                    <a class="dropdown-item" href="/blog-category/{{$category->slug}}">{{$category->title}}</a>
                                @endforeach
                            </div><!-- / dropdown-menu -->
                        </li>
                        <!-- / dropdown -->

                    @elseif($menu_item['has_children'] === "true")

                        <?php
                        $main_nagivation_menu_child_items = get_all_frontend_system_menu_child_items($menu_item['id']);
                        ?>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#x" id="dropdown2" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                {{$title}}
                            </a>
                            <div class="dropdown-menu animated zoomIn fast" aria-labelledby="dropdown2">
                                <a class="dropdown-item active" href="{{$url_link}}">View by Criteria</a>
                                <div class="dropdown-divider"></div>
                                @foreach($main_nagivation_menu_child_items as $menu_item_child)

                                    <?php
                                    $dropdown_toggle = true;
                                    $dropdown = true;
                                    $is_active = $menu_item_child['is_active'] ?? null;
                                    $title = $menu_item_child['title'] ?? null;
                                    $url_link = $menu_item_child['url_link'] ?? null;
                                    $route = $menu_item_child['route'] ?? null;
                                    $icon = "fa fa-angle-down" ?? null;
                                    $permissions = $menu_item_child['permissions'] ?? null;
                                    $has_children = $menu_item_child['has_children'] ?? null;
                                    $children = $menu_item_child['children'] ?? null;
                                    ?>

                                    <a class="dropdown-item" href="{{$url_link}}">{{$title}}</a>
                                @endforeach
                            </div><!-- / dropdown-menu -->
                        </li>
                        <!-- / dropdown -->

                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{$url_link}}">{{$title}}</a>
                        </li>
                    @endif

                <?php
                }
                ?>

                @if(config('social.social_media'))

                    @foreach(config('social.social_media') as $key => $value)
                        <li class="nav-item" style="padding-right: 0px !important;">
                            <a class="nav-link" href="{{$value['link']}}" target="_blank">
                                <i class="nav-icon {{$value['icon']}}"></i>
                            </a>
                        </li>
                    @endforeach

                @endif

                <li class="nav-item" style="padding-right: 0px !important;">
                    <a class="nav-link" href="{{route('frontend.music')}}">
                        <i class="nav-icon fa fa-music"></i>
                    </a>
                </li>

                @if (auth()->guest())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="nav-icon fa fa-sign-in"></i>
                            Login
                        </a>
                    </li>
                @else

                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle" href="#x" id="dropdown2" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="nav-icon fa fa-user-circle-o"></i>
                            Logged in as {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu animated zoomIn fast" aria-labelledby="dropdown2">

                            <a class="dropdown-item active" href="{{$url_link}}">
                                <i class="nav-icon fa fa-id-card-o"></i>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-divider"></div>

                            <a class="nav-link" href="{{ route("admin.home") }}">
                                <i class="nav-icon fa fa-cogs"></i>
                                Dashboard
                            </a>

                            <div class="dropdown-divider"></div>
                            <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                                <i class="nav-icon fa fa-sign-out"></i>
                                {{ trans('global.logout') }}
                            </a>
                            <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div><!-- / dropdown-menu -->
                    </li>
                    <!-- / dropdown -->

                @endif

            </ul>
            <!-- / navbar-nav -->
        </div>
        <!-- / navbar-collapse -->
    </div>
    <!-- / container -->
</nav>
<!-- / custom-menu -->
