<?php

use Illuminate\Database\Seeder;

class BlogPostStatussesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('blog_post_statusses')->delete();

        \DB::table('blog_post_statusses')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'title' => 'New',
                    'slug' => 'new',
                    'created_at' => now(),
                    'updated_at' => now(),
                    'deleted_at' => NULL,
                ),
            1 =>
                array (
                    'id' => 2,
                    'title' => 'Draft',
                    'slug' => 'draft',
                    'created_at' => now(),
                    'updated_at' => now(),
                    'deleted_at' => NULL,
                ),
            2 =>
                array (
                    'id' => 3,
                    'title' => 'Pending Proof Reading',
                    'slug' => 'pending-proof-reading',
                    'created_at' => now(),
                    'updated_at' => now(),
                    'deleted_at' => NULL,
                ),
            3 =>
                array (
                    'id' => 4,
                    'title' => 'Approved',
                    'slug' => 'approved',
                    'created_at' => now(),
                    'updated_at' => now(),
                    'deleted_at' => NULL,
                ),
            4 =>
                array (
                    'id' => 5,
                    'title' => 'Rejected',
                    'slug' => 'rejected',
                    'created_at' => now(),
                    'updated_at' => now(),
                    'deleted_at' => NULL,
                ),
            5 =>
                array (
                    'id' => 6,
                    'title' => 'Published',
                    'slug' => 'published-live',
                    'created_at' => now(),
                    'updated_at' => now(),
                    'deleted_at' => NULL,
                ),
        ));
    }
}
