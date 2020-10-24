<?php

namespace App\Repositories\System;

use Illuminate\Support\Str;
use Meta;

/**
 * Class SystemConfigPluginRepository
 *
 * @package App\Repositories\System
 */
class SystemConfigPluginRepository implements SystemConfigPluginRepositoryInterface
{

    /* Format ******************************************************************************************************* */

    /**
     * @param string      $robots
     * @param string      $title
     * @param string|null $author
     * @param string|null $keywords
     * @param string|null $description
     * @param string|null $image
     *
     * @return mixed|void
     */
    public function formatMetaData(string $robots, string $title, string $author = null, string $keywords = null, string $description = null, string $image = null)
    {
        $app_name           = config('app.name', 'Laravel');
        $app_developer_name = config('app.app_developer_name');
        $page_title         = Str::title($title);
        $robots             =  $robots ?? 'index,follow';
        $image              =  $image ?? 'images/img.jpg';

        Meta::set('viewport', 'width=device-width, initial-scale=1, shrink-to-fit=no');
        Meta::set('robots', $robots);
        Meta::set('title',  $app_name . ' | ' . $page_title );
        Meta::set('author', $app_developer_name );
        Meta::set('keywords', $app_name . ',  ' . $app_developer_name . ', ' . $page_title );
        Meta::set('description', $app_name . ',  ' . $app_developer_name . ', ' . $page_title );
        Meta::set('image', asset($image) );
    }

}
