<?php

use App\Models\Blog\BlogPost;
use App\Models\Blog\BlogPostCategory;
use App\Models\Image\Image;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class BlogPostImagesTableSeeder extends Seeder
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

            $title = $faker->sentence(5);
            $slug = Str::slug($title, '-');

            $new_image = DB::table('blog_post_images')->insert([
                'blog_post_id' => $blog->id,
                'title' => $title,
                'slug' => $slug,
                'blog_post_image_path' => "template/assets/img/blog/blog-med-img$y.jpg",
                'blog_post_image_caption' => $title,
                'credits_if_applicable' => null,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'deleted_at' => null,
            ]);

            $image_type = 'blog_post_images';

            $source = public_path("template/assets/img/blog/blog-med-img$y.jpg");
            $new_name = 'testseeder-'.time().str_pad( $x, 7, "0", STR_PAD_LEFT ).'.jpg';

            copy($source, public_path('images/blog_post_images/'.$new_name));

            $image = new Image();
            $image->image_type_id = 1;                          //$request->input('blog_post_category_id');
            $image->title = 'testseeder-'.$title;                             //$request->input('title');
            $image->slug = Str::slug($title, '-');     //$request->input('slug');
            $image->src = 'images/blog_post_images/'.$new_name; //$request->input('summary');
            $image->mime_type = 'image/jpeg';                   //$request->input('body');
            $image->description = $title;                       //$request->input('body');
            $image->base64 = base64_encode( $image );           //$request->input('body');
            $image->credits_if_applicable = "test";             //$request->input('body');
            $image->alt = "test";                               //$request->input('body');
            $image->save();

            $new_image = Image::whereTitle($title)->first();
            $new_image->update([
                $new_image->title => $image->title,
            ]);

            $blog->blogPostImages()->sync([$image->id]);
        }

        \DB::statement("DROP TABLE blog_post_images");

    }

}
