<?php

use Illuminate\Database\Seeder;

class TestBlogPostCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('blog_post_categories')->truncate();

        \DB::table('blog_post_categories')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'title' => 'Technology',
                    'slug' => 'technology',
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                    'deleted_at' => NULL,
                ),
            1 =>
                array (
                    'id' => 2,
                    'title' => 'Personal',
                    'slug' => 'personal',
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                    'deleted_at' => NULL,
                ),
            2 =>
                array (
                    'id' => 3,
                    'title' => 'Motivation',
                    'slug' => 'motivation',
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                    'deleted_at' => NULL,
                ),
            3 =>
                array (
                    'id' => 4,
                    'title' => 'Reviews',
                    'slug' => 'reviews',
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                    'deleted_at' => NULL,
                ),
            4 =>
                array (
                    'id' => 5,
                    'title' => 'Music',
                    'slug' => 'music',
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                    'deleted_at' => NULL,
                ),
            5 =>
                array (
                    'id' => 6,
                    'title' => 'General',
                    'slug' => 'general',
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                    'deleted_at' => NULL,
                ),
            6 =>
                array (
                    'id' => 7,
                    'title' => 'Politics',
                    'slug' => 'politics',
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                    'deleted_at' => NULL,
                ),
            7 =>
                array (
                    'id' => 8,
                    'title' => 'Sports',
                    'slug' => 'sports',
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                    'deleted_at' => NULL,
                ),
            8 =>
                array (
                    'id' => 9,
                    'title' => 'Dating',
                    'slug' => 'dating',
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                    'deleted_at' => NULL,
                ),
            9 =>
                array (
                    'id' => 10,
                    'title' => 'Love',
                    'slug' => 'love',
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                    'deleted_at' => NULL,
                ),
            10 =>
                array (
                    'id' => 11,
                    'title' => 'Family',
                    'slug' => 'family',
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                    'deleted_at' => NULL,
                ),
            11 =>
                array (
                    'id' => 12,
                    'title' => 'Career',
                    'slug' => 'career',
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                    'deleted_at' => NULL,
                ),
            12 =>
                array (
                    'id' => 13,
                    'title' => 'Social Commentry',
                    'slug' => 'social-commentry',
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                    'deleted_at' => NULL,
                ),
            13 =>
                array (
                    'id' => 14,
                    'title' => 'Satire',
                    'slug' => 'satire',
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                    'deleted_at' => NULL,
                ),
            14 =>
                array (
                    'id' => 15,
                    'title' => 'Rants',
                    'slug' => 'rants',
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                    'deleted_at' => NULL,
                ),
        ));
    }
}
