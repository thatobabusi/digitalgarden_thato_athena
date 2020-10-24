<?php

use App\Models\System\SystemMenuItem;
use App\Models\System\SystemPage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use \Illuminate\Support\Facades\Request;

if (! function_exists('get_all_system_pages')) {
    /**
     * @return SystemPage[]|Collection
     */
    function get_all_system_pages()
    {
        return SystemPage::all();
    }

}

if (! function_exists('get_all_frontend_system_menu_items')) {
    /**
     * @return mixed
     */
    function get_all_frontend_system_menu_items()
    {
        return SystemMenuItem::where("type","=","frontend_main_navigation")
            ->whereParentId(null)
            ->orderBy("order", "asc")
            ->get();
    }
}

if (! function_exists('get_all_frontend_system_menu_child_items')) {
    /**
     * @param int $menu_item_id
     *
     * @return SystemMenuItem[]|Builder[]|Collection|\Illuminate\Database\Query\Builder[]|\Illuminate\Support\Collection
     */
    function get_all_frontend_system_menu_child_items(int $menu_item_id)
    {
        return SystemMenuItem::where("type","=","frontend_main_navigation")
            ->whereParentId($menu_item_id)
            ->orderBy("order", "asc")
            ->get();
    }
}

if (! function_exists('get_all_frontend_system_page_sections')) {
    /**
     * @return mixed
     */
    function get_all_frontend_system_page_sections()
    {
        return \App\Models\System\SystemPageSection::pluck("order");
    }
}

