<?php

use App\Models\BlogPost;
use App\Models\BlogPostCategory;
use App\Models\BlogPostTag;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogPostPostTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $blogs = BlogPost::all();
        $y = 0;

        foreach($blogs as $blog) {
            $y++;
            $blog_post_tag_id = BlogPostTag::inRandomOrder()->first()->id;

            $created_at = $faker->dateTimeBetween($startDate = '-6 months', $endDate = 'now');
            $updated_at = $faker->dateTimeBetween($startDate = '-4 months', $endDate = 'now');

            DB::table('blog_post_post_tags')->insert([
                'blog_post_id' => $blog->id,
                'blog_post_tag_id' => $blog_post_tag_id,
                'created_at' => $created_at,
                'updated_at' => $updated_at,
            ]);
        }
    }
}
