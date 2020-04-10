<?php

namespace App\Repositories\Image;

use App\Models\Image\Image;
use Illuminate\Http\UploadedFile;

/**
 * Interface ImageRepositoryInterface
 *
 * @package App\Repositories\Image
 */
interface ImageRepositoryInterface
{

    /**
     * @param UploadedFile $image
     * @param string                        $image_type
     *
     * @return mixed
     */
    public function uploadImage(UploadedFile $image, string $image_type);

    /**
     * @param Image $old_image
     *
     * @return mixed
     */
    public function deleteUploadedImage(Image $old_image);

    /**
     * @param string $id
     *
     * @return mixed
     */
    public function getImageRecordById(string $id);

    /**
     * @param string $slug
     *
     * @return mixed
     */
    public function getImageRecordBySlug(string $slug);

    /**
     * @param string|null $limit
     *
     * @return mixed
     */
    public function getAllImageRecords(string $limit = null);
}
