<?php

use App\Models\Blog\BlogPost;
use App\Models\Blog\BlogPostCategory;
use App\Models\Blog\BlogPostTag;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogPostBlogPostTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('blog_post_blog_post_tag')->truncate();

        $faker = Faker::create();

        $blogs = BlogPost::all();
        $y = 0;

        foreach($blogs as $blog) {
            $y++;
            $blog_post_tag_id1 = BlogPostTag::inRandomOrder()->first()->id;
            $blog_post_tag_id2 = BlogPostTag::inRandomOrder()->first()->id;
            $blog_post_tag_id3 = BlogPostTag::inRandomOrder()->first()->id;

            $created_at = $faker->dateTimeBetween($startDate = '-24 months', $endDate = 'now');
            $updated_at = $faker->dateTimeBetween($created_at, $endDate = 'now');

            DB::table('blog_post_blog_post_tag')->insert([
                'blog_post_id' => $blog->id,
                'blog_post_tag_id' => $blog_post_tag_id1,
                'created_at' => $created_at,
                'updated_at' => $updated_at,
            ]);
            DB::table('blog_post_blog_post_tag')->insert([
                'blog_post_id' => $blog->id,
                'blog_post_tag_id' => $blog_post_tag_id2,
                'created_at' => $created_at,
                'updated_at' => $updated_at,
            ]);
            DB::table('blog_post_blog_post_tag')->insert([
                'blog_post_id' => $blog->id,
                'blog_post_tag_id' => $blog_post_tag_id3,
                'created_at' => $created_at,
                'updated_at' => $updated_at,
            ]);
        }
    }
}
