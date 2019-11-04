<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogPostTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $y = 20;
        for ($x = 0; $x <= $y; $x++) {
            $title = $faker->sentence(2);
            $slug = Str::slug($title, '-');

            $created_at = $faker->dateTimeBetween($startDate = '-6 months', $endDate = 'now');
            $updated_at = $faker->dateTimeBetween($startDate = '-4 months', $endDate = 'now');

            DB::table('blog_post_tags')->insert([
                'title' => $title,
                'slug' => $slug,
                'created_at' => $created_at,
                'updated_at' => $updated_at,
                'deleted_at' => null,
            ]);
        }
    }
}
