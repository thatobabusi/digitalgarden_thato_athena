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

            if($y > 11) {
                $y = 0;
            }

            $y++;

            $title = $faker->sentence(5);
            $slug = Str::slug($title, '-');
            $created_at = $faker->dateTimeBetween($startDate = '-24 months', $endDate = 'now');
            $updated_at = $faker->dateTimeBetween($created_at, $endDate = 'now');

            DB::table('blog_post_images')->insert([
                'blog_post_id' => $blog->id,
                'title' => $title,
                'slug' => $slug,
                'blog_post_image_path' => "template/assets/img/blog/blog-med-img$y.jpg",
                'blog_post_image_caption' => $title,
                'credits_if_applicable' => null,
                'created_at' => $created_at,
                'updated_at' => $updated_at,
                'deleted_at' => null,
            ]);
        }

    }
}
