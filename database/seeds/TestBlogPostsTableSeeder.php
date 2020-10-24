<?php

use App\Models\Blog\BlogPostCategory;
use App\Models\Blog\BlogPostStatus;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TestBlogPostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('blog_posts')->truncate();

        $faker = Faker::create('en_US');

        //$y = 4988; //For stress testing
        //Remember it kills the max execution time so perhaps make a function to beat that??? YEAH, Yeah, ok, yeah
        $y = 50;
        for ($x = 0; $x < $y; $x++) {
            core_helper_extend_timeout_time();
            $category_id = BlogPostCategory::inRandomOrder()->skip(12)->first()->id;
            $status_id = BlogPostStatus::inRandomOrder()->first()->id;

            $title = $faker->realText($maxNbChars = 20, $indexSize = 2);
            $slug = Str::slug($title, '-') . '-' .$faker->unixTime($max = 'now');

            $summary = $faker->realText($maxNbChars = 200, $indexSize = 2);
            $body = $faker->realText($maxNbChars = 6000, $indexSize = 2);

            $created_at = $faker->dateTimeBetween($startDate = '-24 months', $endDate = 'now');
            $updated_at = $faker->dateTimeBetween($created_at, $endDate = 'now');

            DB::table('blog_posts')->insert([
                'blog_post_category_id' => $category_id,
                'blog_post_status_id' => $status_id,
                'title' => $title,
                'slug' => $slug,
                'summary' => $summary,
                'body' => $body,
                'created_at' => $created_at,
                'updated_at' => \Carbon\Carbon::now(),
                'deleted_at' => null,
            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
}
