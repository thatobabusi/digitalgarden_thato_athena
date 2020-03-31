<?php

use App\Models\Blog\BlogPost;
use App\Models\Blog\BlogPostCategory;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
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
        \DB::table('blog_post_images')->truncate();

        $faker = Faker::create();

        $blogs = BlogPost::all();
        $y = 0;

        foreach($blogs as $blog) {

            if($y > 9) {
                $y = 0;
            }

            $y++;

            $title = $faker->sentence(5);
            $slug = Str::slug($title, '-');

            DB::table('blog_post_images')->insert([
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
        }

    }
}
