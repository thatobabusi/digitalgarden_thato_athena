<?php

namespace App\Repositories\System;

use App\Models\System\SystemPage;
use App\Models\System\SystemPageMetaData;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Meta;

/**
 * Class SystemMetaRepository
 *
 * @package App\Repositories\System
 */
class SystemMetaRepository implements SystemMetaRepositoryInterface
{
    /* Store ******************************************************************************************************** */

    /**
     * @param Request    $request
     * @param SystemPage $systemPage
     *
     * @return mixed
     */
    public function storeMetaData(Request $request, SystemPage $systemPage)
    {
        $robots = str_replace("-","",$request->meta_robots);

        $system_page_metadata = SystemPageMetaData::create([
            'system_page_id' => $systemPage->id,
            'title' => $request->meta_title,
            'author' => $request->meta_author,
            'robots' => $robots,
            'keywords' => $request->meta_keywords,
            'description' => $request->meta_description,
        ]);

        return $system_page_metadata;
    }

    /* Update ******************************************************************************************************* */

    /**
     * @param Request $request
     * @param int     $id
     *
     * @return mixed
     */
    public function updateMetaData(Request $request, int $id)
    {
        $system_page_metadata = SystemPageMetaData::whereId($id)->first();

        if(isset($system_page_metadata->id)) {

            $system_page_metadata->title = $request->meta_title;
            $system_page_metadata->author = $request->meta_author;
            $system_page_metadata->robots = str_replace("-", "", $request->meta_robots);
            $system_page_metadata->keywords = $request->meta_keywords;
            $system_page_metadata->description = $request->meta_description;
            $system_page_metadata->save();

            return $system_page_metadata;
        }
        return null;
    }

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
