<?php

use App\Models\Blog\BlogPost;
use App\Models\Image\Image;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Str;

class TestBlogPostImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::create('blog_post_images', function(Blueprint $table)
        {
            $table->bigInteger('id', true)->unsigned();
            $table->integer('blog_post_id');
            $table->string('title', 191);
            $table->string('slug', 191);
            $table->string('blog_post_image_path', 191);
            $table->string('blog_post_image_caption', 191);
            $table->string('credits_if_applicable', 191)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        \DB::table('blog_post_images')->truncate();

        #Deletes all existing files in the folders
        #This will only delete test seeder stuff
        $dir = public_path('images/blog_post_images/');
        if (is_dir($dir)){
            if ($dh = opendir($dir)){
                while (($file = readdir($dh)) !== false){
                    if(!file_exists($file)) {

                        #only delete test seeder stuff
                        if (strpos($file, 'testseeder-') !== false) {
                            unlink($dir.$file);
                        }

                    }
                }
                closedir($dh);
            }
        }

        $faker = Faker::create();

        $blogs = BlogPost::all();
        $y = 0;
        $x = 0;

        foreach($blogs as $blog) {

            if($y > 9) {
                $y = 0;
            }

            $y++;
            $x++;

            $image_type = 'blog_post_images';

            $source = public_path("template/assets/img/blog/blog-med-img$y.jpg");
            $new_name = 'testseeder-'.time().str_pad( $x, 7, "0", STR_PAD_LEFT ).'.jpg';

            copy($source, public_path('images/blog_post_images/'.$new_name));

            $image = new Image();
            $image->image_type_id = 1;
            $image->title = $new_name;
            $image->slug = Str::slug($new_name, '-');
            $image->src = 'images/'.$image_type.'/'.$new_name;
            $image->mime_type = 'image/jpeg';
            $image->description = $title = $faker->sentence(5);
            $image->base64 = base64_encode( $image );
            $image->credits_if_applicable = "test";
            $image->alt = "test";
            $image->save();

            $blog->blogPostImages()->sync([$image->id]);
        }
    }
}
