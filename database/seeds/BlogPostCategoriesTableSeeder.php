<?php

use Illuminate\Database\Seeder;

class BlogPostCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
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
                'created_at' => '2019-12-27 03:39:42',
                'updated_at' => '2020-02-26 06:43:41',
                'deleted_at' => NULL,
            ),
            1 =>
            array (
                'id' => 2,
                'title' => 'Personal',
                'slug' => 'personal',
                'created_at' => '2019-12-07 20:59:59',
                'updated_at' => '2020-02-06 09:19:31',
                'deleted_at' => NULL,
            ),
            2 =>
            array (
                'id' => 3,
                'title' => 'Motivation',
                'slug' => 'motivation',
                'created_at' => '2020-02-22 13:54:45',
                'updated_at' => '2020-01-21 07:24:55',
                'deleted_at' => NULL,
            ),
            3 =>
            array (
                'id' => 4,
                'title' => 'Reviews',
                'slug' => 'reviews',
                'created_at' => '2019-11-20 05:56:13',
                'updated_at' => '2019-12-10 22:25:36',
                'deleted_at' => NULL,
            ),
            4 =>
            array (
                'id' => 5,
                'title' => 'Music',
                'slug' => 'music',
                'created_at' => '2020-02-26 08:58:42',
                'updated_at' => '2020-02-11 09:42:27',
                'deleted_at' => NULL,
            ),
            5 =>
            array (
                'id' => 6,
                'title' => 'General',
                'slug' => 'general',
                'created_at' => '2019-12-26 18:21:05',
                'updated_at' => '2019-11-17 14:52:39',
                'deleted_at' => NULL,
            ),
            6 =>
            array (
                'id' => 7,
                'title' => 'Politics',
                'slug' => 'politics',
                'created_at' => '2020-02-16 08:20:57',
                'updated_at' => '2020-01-29 18:40:46',
                'deleted_at' => NULL,
            ),
            7 =>
            array (
                'id' => 8,
                'title' => 'Sports',
                'slug' => 'sports',
                'created_at' => '2020-02-04 18:11:50',
                'updated_at' => '2019-11-25 16:17:53',
                'deleted_at' => NULL,
            ),
            8 =>
            array (
                'id' => 9,
                'title' => 'Dating',
                'slug' => 'dating',
                'created_at' => '2020-03-01 14:55:12',
                'updated_at' => '2019-11-26 08:46:01',
                'deleted_at' => NULL,
            ),
            9 =>
            array (
                'id' => 10,
                'title' => 'Love',
                'slug' => 'love',
                'created_at' => '2019-11-26 05:38:50',
                'updated_at' => '2019-12-17 13:11:07',
                'deleted_at' => NULL,
            ),
            10 =>
            array (
                'id' => 11,
                'title' => 'Family',
                'slug' => 'family',
                'created_at' => '2020-02-08 05:47:01',
                'updated_at' => '2019-11-29 20:41:32',
                'deleted_at' => NULL,
            ),
            11 =>
            array (
                'id' => 12,
                'title' => 'Career',
                'slug' => 'career',
                'created_at' => '2019-10-23 01:52:26',
                'updated_at' => '2020-01-04 10:43:29',
                'deleted_at' => NULL,
            ),
            12 =>
            array (
                'id' => 13,
                'title' => 'Social Commentry',
                'slug' => 'social-commentry',
                'created_at' => '2019-12-31 09:58:23',
                'updated_at' => '2020-02-26 02:48:58',
                'deleted_at' => NULL,
            ),
            13 =>
            array (
                'id' => 14,
                'title' => 'Satire',
                'slug' => 'satire',
                'created_at' => '2020-02-02 12:38:55',
                'updated_at' => '2019-12-21 01:15:43',
                'deleted_at' => NULL,
            ),
            14 =>
            array (
                'id' => 15,
                'title' => 'Rants',
                'slug' => 'rants',
                'created_at' => '2020-02-04 18:58:22',
                'updated_at' => '2020-02-24 13:41:39',
                'deleted_at' => NULL,
            ),
        ));


    }
}
