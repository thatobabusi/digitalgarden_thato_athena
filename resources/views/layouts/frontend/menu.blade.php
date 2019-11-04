<nav class="navbar navbar-default navbar-fixed-top ">
    <div class="container">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav-collapse">
            <span class="sr-only">Toggle Navigation</span>
            <i class="fa fa-bars"></i>
        </button>
        <a href="{{config('app.app_url')}}" class="navbar-brand">
            {{ config('app.name', 'Laravel') }}
            {{--<img src="template/assets/img/logo/bravana-lite-logo.png" alt="Bravana Logo">--}}
        </a>
        <div id="main-nav-collapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav main-navbar-nav">
                {{--Building menu--}}
                <?php
                $main_nagivation_menu_items = config('navigationmenu.main_navigation', ['You have not set up the config.navigationmenu.php properly']);

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
                    @if($menu_item['has_children'])
                        <li class="dropdown @if($is_active) active @endif">
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
                        </li>
                    @else
                        <li class="dropdown">
                            <a href="{{$route}}">{{$title}}</a>
                        </li>
                    @endif
                <?php
                }
                ?>
        </div>
        <!-- END MAIN NAVIGATION -->
    </div>
</nav>
