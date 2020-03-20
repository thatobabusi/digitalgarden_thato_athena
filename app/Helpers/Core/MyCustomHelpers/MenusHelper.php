<?php

if (! function_exists('build_admin_menu_items')) {
    /**
     * @param $menu_items_array
     * @param $company
     *
     * Dynamically builds Menu items for the menu inside the Admin Dashboard page based on the array in config file
     * Sorts out the links permissions, where plugins are applicable it controls their access as well
     * @return string
     */
    /*function build_admin_menu_items($menu_items_array, $company)
    {
        $menu = "";
        foreach($menu_items_array as $item) {

            if(is_array($item) && array_key_exists('title', $item) && isset($item['title']) && Auth::user()->hasPermission($item['permissions'], $company) ) {

                $meets_criteria = false;
                $display_item = false;
                $plugin_requires_user_in_url = false;
                $href = null;
                $url = "#";

                #if no special requirements
                if(!is_array($item['requirements'])) {
                    $display_item = true;
                }

                elseif( is_array($item['requirements']) ) {

                    #if is plugin thats enabled
                    #would normally look like this $company->Plugins()->where('plugin', 'Management by Objective')->exists()
                    if( ($item['requirements'][0] === 'plugin') && ( $company->Plugins()->where($item['requirements'][0], $item['requirements'][1])->exists() || Auth::user()->isWebAdmin() ) ) {
                        $display_item = true;
                        $plugin_requires_user_in_url = true;
                    }
                    #if has requirements and meets the criteria
                    if( ($meets_criteria = "$".$item['requirements'][0]."->".$item['requirements'][1]) && ($meets_criteria == true) ) {
                        $display_item = true;
                    }

                }

                $title = $item['title'];

                if( $display_item ) {

                    if($plugin_requires_user_in_url) {
                        $user = \Auth::User()->username;
                        $url = route($item['route'], [$company, $user]);
                    }
                    elseif(isset($item['route'])) {
                        $url = route($item['route'], [$company]);
                        if($plugin_requires_user_in_url) {
                            $url = route($item['route'], [$company]);
                        }
                    }
                    elseif(isset($item['url']) && (strpos($item['url'], '%company_name%') !== false) ) {
                        $url = str_replace('%company_name%',$company->company_name,$item['url']);
                    }
                    elseif(isset($item['url']) ) {
                        $url = $item['url'];
                    }

                    $menu .= "<a class='list-group-item' href='".$url."'>$title</a>";

                }

            }

        }

        return $menu;
    }*/
}

if (! function_exists('build_side_menu_items')) {
    /**
     * @param $main_nagivation_menu_items
     * @param $company
     *
     * Builds the first level of the menus
     *
     * Dynamically builds Menu items for the side navigation menu based on the array in config file
     * Sorts out the links permissions, where plugins are applicable it controls their access as well
     *
     * Called like this {!! build_side_menu_items( config('seams-backend-menu.seams'), $company ) !!
     * @return string
     */
    /*function build_side_menu_items($main_navigation_menu_items, $company)
    {
        $menu = '';

        foreach($main_navigation_menu_items as $menu_item) {

            $title = $menu_item['title'] ?? null;
            $icon = $menu_item['icon'] ?? null;
            $route = $menu_item['route'] ?? null;
            $url_link = $menu_item['url_link'] ?? null;
            $url = "#";
            $permissions = $menu_item['permissions'] ?? null;
            $children = $menu_item['children'] ?? null;
            $children_menu = null;
            $dropdown = null;
            $dropdown_icon = null;
            $plugin_requires_user_in_url = false;

            #Generate url from either route or url sent
            if($plugin_requires_user_in_url && $route) {
                $user = \Auth::User()->username;
                $url = route($route, [$company, $user]);
            }
            elseif(isset($route)) {
                $url = route($route, [$company]);
                if($plugin_requires_user_in_url) {
                    $url = route($route, [$company]);
                }
            }
            elseif(isset($url_link) && (strpos($url_link, '%company_name%') !== false) ) {
                $url = str_replace('%company_name%',$company->company_name,$url_link);
            }
            elseif(isset($url_link) ) {
                $url = $url_link;
            }
            #Done

            if( array_key_exists('children', $menu_item) && is_array($menu_item['children']) && (count($children) > 1) ) {
                $dropdown = 'treeview';
                $dropdown_icon = " <span class=\"pull-right-container\">
                                        <i class=\"fa fa-angle-left pull-right\"></i>
                                    </span>";

                $children_menu .= build_sub_menu_items($children, $company);
            }

            $menu .=
                "<li class=\"$dropdown\">
                    <a href=\"$url\">
                        <div class=\"icon\"><i class=\"$icon\"></i></div>
                        <span>$title</span>
                        $dropdown_icon
                    </a>
                    $children_menu
                </li>";
        }

        return $menu;
    }*/
}

if (! function_exists('build_sub_menu_items')) {
    /**
     * @param $main_navigation_menu_items
     * @param $company
     *
     * Builds the second, third, nth level of the menus Recursively
     *
     * Dynamically builds Menu sub-items for the side navigation menu based on the array in config file
     * Sorts out the links permissions, where plugins are applicable it controls their access as well

     *  Called like this {!! build_sub_menu_items( config('seams-backend-menu.seams'), $company ) !!}
     *
     * @return string
     */
    /*function build_sub_menu_items($main_navigation_menu_items, $company)
    {
        $menu = '';

        $menu .= "<ul class=\"treeview-menu\">";

        foreach($main_navigation_menu_items as $menu_item) {

            $title = $menu_item['title'] ?? null;
            $icon = $menu_item['icon'] ?? null;
            $route = $menu_item['route'] ?? null;
            $url_link = $menu_item['url_link'] ?? null;
            $url = "#";
            $permissions = $menu_item['permissions'] ?? null;
            $children = $menu_item['children'] ?? null;
            $children_menu = null;
            $dropdown = null;
            $dropdown_icon = null;
            $plugin_requires_user_in_url = false;

            #Generate url from either route or url sent
            if($plugin_requires_user_in_url && $route) {
                $user = \Auth::User()->username;
                $url = route($route, [$company, $user]);
            }
            elseif(isset($route)) {
                $url = route($route, [$company]);
                if($plugin_requires_user_in_url) {
                    $url = route($route, [$company]);
                }
            }
            elseif(isset($url_link) && (strpos($url_link, '%company_name%') !== false) ) {
                $url = str_replace('%company_name%',$company->company_name,$url_link);
            }
            elseif(isset($url_link) ) {
                $url = $url_link;
            }
            #Done

            if( array_key_exists('children', $menu_item) && is_array($menu_item['children']) && (count($children) > 1) ) {
                $dropdown = 'treeview';
                $dropdown_icon = " <span class=\"pull-right-container\">
                                        <i class=\"fa fa-angle-left pull-right\"></i>
                                    </span>";

                $children_menu .= build_sub_menu_items($children, $company);
            }

            $menu .= "<li class=\"$dropdown\">
                        <a href=\"$url\">
                            <div class=\"icon\"><i class=\"$icon\"></i></div>
                            <span>$title</span>
                            $dropdown_icon
                        </a>
                        $children_menu
                    </li>";

        }

        $menu .= "</ul>";


        return $menu;
    }*/
}

//--------------------OLD
if (! function_exists('build_frontend_menu')) {
    /*function build_frontend_menu($user)
    {
        if(!$user) {
            $user = 'TODO::We going to use this to pass on who it is so we can check permissions for some future conditions';
        }

        $main_nagivation_menu_items = config('navigationmenu.main_navigation', ['You have not set up the config.navigationmenu.php properly']);

        try {
            dd($main_nagivation_menu_items);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }*/
}

if (! function_exists('build_backend_menu')) {
    /*function build_backend_menu($user)
    {
        try {
            //
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }*/
}

