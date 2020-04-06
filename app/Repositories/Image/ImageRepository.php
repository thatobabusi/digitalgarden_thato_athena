<?php

namespace App\Repositories\Image;

use App\Models\Image\Image;
use Illuminate\Support\Str;

class ImageRepository implements ImageRepositoryInterface
{

    /**
     * @param \Illuminate\Http\UploadedFile $image
     * @param string                        $image_type
     *
     * @return Image|\Illuminate\Http\UploadedFile
     */
    public function uploadImage(\Illuminate\Http\UploadedFile $image, string $image_type)
    {

        #Generate image unique name
        $image_upload_name = time().'.'.$image->extension();
        $image_mime_type = $image->getMimeType();

        #Move the image to the public folder
        $folder_path = public_path('images/'.$image_type);
        $image->move($folder_path, $image_upload_name);

        #Base 64 encode it
        $image_base64 = base64_encode( $image );

        $image = new Image();
        $image->image_type_id = 1;                                      //$request->input('blog_post_category_id');
        $image->title = $image_upload_name;                             //$request->input('title');
        $image->slug = Str::slug($image_upload_name, '-');     //$request->input('slug');
        $image->src = 'images/'.$image_type.'/'.$image_upload_name;     //$request->input('summary');
        $image->mime_type = $image_mime_type;                           //$request->input('body');
        $image->description = $image_upload_name;                       //$request->input('body');
        $image->base64 = $image_base64;                                 //$request->input('body');
        $image->credits_if_applicable = "test";                         //$request->input('body');
        $image->alt = "test";                                           //$request->input('body');
        $image->save();

        return $image;
    }

    /**
     * @param Image $old_image
     *
     * @return bool
     * @throws \Exception
     */
    public function deleteUploadedImage(Image $old_image)
    {
        #Delete the image file from  the public folder

        unlink(public_path($old_image->src));

        if($old_image->delete()) {

            Image::whereId($old_image->id)->delete();

            return true;
        }
        dd("Doesnt delete");

    }

    /**
     * @param string $id
     *
     * @return Image|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function getImageRecordById(string $id)
    {
        return Image::whereId($id)->first();
    }

    /**
     * @param string $slug
     *
     * @return Image|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function getImageRecordBySlug(string $slug)
    {
        return Image::whereSlug($slug)->first();
    }

}
