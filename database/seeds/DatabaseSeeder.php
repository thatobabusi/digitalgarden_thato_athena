<?php

use App\Models\BlogPost;
use App\Models\BlogPostCategory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(BlogPostCategoriesTableSeeder::class);
        $this->call(BlogPostsTableSeeder::class);
        $this->call(BlogPostImagesTableSeeder::class);
        $this->call(BlogPostTagsTableSeeder::class);
        $this->call(BlogPostPostTagsTableSeeder::class);
    }
}
