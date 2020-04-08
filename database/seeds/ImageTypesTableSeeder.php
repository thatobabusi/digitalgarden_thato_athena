<?php

use Illuminate\Database\Seeder;

class ImageTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('image_types')->truncate();

        DB::table('image_types')->insert([
            'title' => 'Blog Post Images',
            'slug' => 'blog-post-images',
            'folder' => 'blog_post_images',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);

        DB::table('image_types')->insert([
            'title' => 'User Profile Images',
            'slug' => 'user-profile-photo-images',
            'folder' => 'user_profile_photo_images',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);

        DB::table('image_types')->insert([
            'title' => 'Advertised Brand Images',
            'slug' => 'advertised-brand-images',
            'folder' => 'advertised_brand_images',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);
    }
}
