<?php

namespace App\Repositories\System;

use App\Models\Image\Image;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

/**
 * Interface ImageRepositoryInterface
 *
 * @package App\Repositories\Image
 */
interface SystemImageRepositoryInterface
{

    /* Get ********************************************************************************************************** */

    /**
     * @param string $id
     *
     * @return Image|Builder|Model|object|null
     */
    public function getImageRecordById(string $id);

    /**
     * @param string $slug
     *
     * @return Image|Builder|Model|object|null
     */
    public function getImageRecordBySlug(string $slug);

    /**
     * @param string|null $limit
     *
     * @return Image[]|Collection|\Illuminate\Support\Collection
     */
    public function getAllImageRecords(string $limit = null);

    /* Upload ******************************************************************************************************* */

    /**
     * @param UploadedFile $image
     * @param string                        $image_type
     *
     * @return Image|UploadedFile|mixed
     */
    public function uploadImage(UploadedFile $image, string $image_type);

    /* Delete ******************************************************************************************************* */

    /**
     * @param Image $old_image
     *
     * @return mixed
     */
    public function deleteUploadedImage(Image $old_image);

    //TODO::Complete

    /**
     * @return void
     */
    public function massDestroyImageRecords() :void;

}
