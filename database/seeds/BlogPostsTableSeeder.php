<?php

use App\Models\Blog\BlogPostCategory;
use App\Models\Blog\BlogPostStatus;
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
        \DB::table('blog_posts')->truncate();

        $faker = Faker::create('en_US');

        $y = 100;
        for ($x = 0; $x < $y; $x++) {

            $category_id = BlogPostCategory::inRandomOrder()->first()->id;
            $status_id = BlogPostStatus::inRandomOrder()->first()->id;

            $title = $faker->realText($maxNbChars = 20, $indexSize = 2);
            $slug = Str::slug($title, '-') . '-' .$faker->unixTime($max = 'now');

            $summary = $faker->realText($maxNbChars = 200, $indexSize = 2);
            $body = $faker->realText($maxNbChars = 6000, $indexSize = 2);

            /*
            $title = $faker->sentence(5);
            $slug = Str::slug($title, '-');
            $summary = $faker->paragraph($nbSentences = 3, $variableNbSentences = true);
            $body = $faker->paragraphs($nb = 10, $asText = false);
            */

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
                'updated_at' => now(),
                'deleted_at' => null,
            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
}
