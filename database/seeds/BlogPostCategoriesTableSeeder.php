<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class BlogPostCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();

        $y = 12;
        for ($x = 0; $x <= $y; $x++) {
            $title = $faker->sentence(3);
            $slug = Str::slug($title, '-');

            $created_at = $faker->dateTimeBetween($startDate = '-6 months', $endDate = 'now');
            $updated_at = $faker->dateTimeBetween($startDate = '-4 months', $endDate = 'now');

            DB::table('blog_post_categories')->insert([
                'title' => $title,
                'slug' => $slug,
                'created_at' => $created_at,
                'updated_at' => $updated_at,
                'deleted_at' => null,
            ]);
        }
    }
}
