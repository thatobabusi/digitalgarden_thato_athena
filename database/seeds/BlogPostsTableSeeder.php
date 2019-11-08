<?php

use App\Models\BlogPostCategory;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogPostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $y = 10;
        for ($x = 0; $x < $y; $x++) {
            $category_id = BlogPostCategory::inRandomOrder()->first()->id;

            $title = $faker->sentence(5);
            $slug = Str::slug($title, '-');
            $summary = $faker->paragraph();
            $body = $summary . "<br/>" . $faker->paragraph();

            $created_at = $faker->dateTimeBetween($startDate = '-6 months', $endDate = 'now');
            $updated_at = $faker->dateTimeBetween($startDate = '-4 months', $endDate = 'now');

            DB::table('blog_posts')->insert([
                'blog_post_category_id' => $category_id,
                'title' => $title,
                'slug' => $slug,
                'summary' => $summary,
                'body' => $body,
                'created_at' => $created_at,
                'updated_at' => $updated_at,
                'deleted_at' => null,
            ]);
        }
    }
}
