<nav class="navbar navbar-default navbar-fixed-top ">
    <div class="container">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav-collapse">
            <span class="sr-only">Toggle Navigation</span>
            <i class="fa fa-bars"></i>
        </button>
        <a href="{{config('app.app_url')}}" class="navbar-brand">
            {{ config('app.name', 'Laravel') }}
        </a>
        <div id="main-nav-collapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav main-navbar-nav">
                {{--Building menu--}}
                <?php
                if( (auth()->guest()) ) {
                    $main_nagivation_menu_items = \App\Models\System\SystemMenuItem::where("type","=","frontend_main_navigation")
                                                                                    ->where("title","<>","View Dashboard")
                                                                                    ->orderBy("order", "asc")
                                                                                    ->get();
                }
                else {
                    $main_nagivation_menu_items = \App\Models\System\SystemMenuItem::where("type","=","frontend_main_navigation")
                                                                                    ->orderBy("order", "asc")
                                                                                    ->get();
                }

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
                    //dd($title);
                    ?>
                    @if($menu_item['has_children'] !== false)

                        @if($menu_item['has_children'] === 'blog_post_categories')
                            <li class="dropdown ">
                                <a href="#"
                                   class="toggle"
                                   data-toggle="dropdown">
                                    {{$title}}
                                </a>
                                <ul class="dropdown-menu" role="menu">

                                    <li class="dropdown">
                                        <a href="{{$url_link}}">All Blog Posts</a>
                                    </li>

                                    @foreach($blogPostCategories as $category)
                                        <li><a href="/blog-category/{{$category->slug}}">{{$category->title}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            <li class="dropdown">
                                <a href="{{$url_link}}">{{$title}}</a>
                            </li>
                        @endif
                        {{--<li class="dropdown @if($is_active) active @endif">
                            <a href="#"
                               class="@if($dropdown_toggle) toggle @endif"
                               data-toggle="@if($dropdown) dropdown @endif">
                                @if($title) @endif{{$title}}
                                    <i class="{{$icon}}"></i>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                @foreach($children as $child)
                                    @if(is_array($child))
                                        <li><a href="{{$child['title']}}">{{$child['title']}}</a></li>
                                    @else
                                        <li><a href="{{$child}}">{{$child}}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>--}}
                    @else
                        <li class="dropdown">
                            <a href="{{$url_link}}">{{$title}}</a>
                        </li>
                    @endif
                <?php
                }
                ?>

                @if (auth()->guest())
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">
                            <i class="nav-icon fas fa-fw fa-sign-out-alt">

                            </i>
                            Login
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-fw fa-sign-out-alt">

                            </i>
                            Logged in as {{ Auth::user()->name }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                            <i class="nav-icon fas fa-fw fa-sign-out-alt">

                            </i>
                            {{ trans('global.logout') }}
                        </a>
                        <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                @endif

            </ul>

        </div>
        <!-- END MAIN NAVIGATION -->
    </div>
</nav>
