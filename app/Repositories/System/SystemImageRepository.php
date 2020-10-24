<?php

namespace App\Repositories\System;

use App\Models\Image\Image;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

/**
 * Class ImageRepository
 *
 * @package App\Repositories\Image
 */
class SystemImageRepository implements SystemImageRepositoryInterface
{

    /* Get ********************************************************************************************************** */

    /**
     * @param string $id
     *
     * @return Image|Builder|Model|object|null
     */
    public function getImageRecordById(string $id)
    {
        return Image::whereId($id)->first();
    }

    /**
     * @param string $slug
     *
     * @return Image|Builder|Model|object|null
     */
    public function getImageRecordBySlug(string $slug)
    {
        return Image::whereSlug($slug)->first();
    }

    /**
     * @param string|null $limit
     *
     * @return Image[]|Collection|\Illuminate\Support\Collection
     */
    public function getAllImageRecords(string $limit = null)
    {
        if($limit === null) {
            return Image::all();
        }

        return Image::orderBy('created_at', 'DESC')->get()->take((int)$limit);
    }

    /* Upload ******************************************************************************************************* */

    /**
     * @param UploadedFile $image
     * @param string                        $image_type
     *
     * @return Image|UploadedFile|mixed
     */
    public function uploadImage(UploadedFile $image, string $image_type)
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

    /* Delete ******************************************************************************************************* */

    /**
     * @param Image $old_image
     *
     * @return bool|mixed
     * @throws Exception
     */
    public function deleteUploadedImage(Image $old_image)
    {
        #Delete the image file from  the public folder

        unlink(public_path($old_image->src));

        if($old_image->delete()) {

            Image::whereId($old_image->id)->delete();

            return true;
        }
    }

    //TODO::Complete

    /**
     * @return void
     */
    public function massDestroyImageRecords() :void
    {
        //
    }

}
