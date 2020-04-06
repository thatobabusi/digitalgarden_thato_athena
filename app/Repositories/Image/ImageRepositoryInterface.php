<?php

namespace App\Repositories\Image;

use App\Models\Image\Image;

interface ImageRepositoryInterface
{

    /**
     * @param \Illuminate\Http\UploadedFile $image
     * @param string                        $image_type
     *
     * @return mixed
     */
    public function uploadImage(\Illuminate\Http\UploadedFile $image, string $image_type);

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
}
