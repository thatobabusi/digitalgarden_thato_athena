<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {

        Schema::disableForeignKeyConstraints();

        #Get default stuff that is needed regardless
        $this->call([
            BlogPostStatussesTableSeeder::class,
            ImageTypesTableSeeder::class,
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,

            SystemConfigPluginsTableSeeder::class,
            SystemPageCategoriesTableSeeder::class,
            SystemMenuItemsTableSeeder::class
        ]);

        #Invoke Test Data Seeders
        if(app()->environment() === 'local') {

            $this->call([
                TestUsersTableSeeder::class,
                TestRoleUserTableSeeder::class,
            ]);

            $this->call([
                TestBlogPostCategoriesTableSeeder::class,
                TestBlogPostsTableSeeder::class,
                TestBlogPostImagesTableSeeder::class,
                TestBlogPostTagsTableSeeder::class,
                TestBlogPostBlogPostTagTableSeeder::class
            ]);
        }

        #Invoke Real Data Seeders
        if(app()->environment() === 'production') {

            $this->call([
                UsersTableSeeder::class,
                RoleUserTableSeeder::class,
            ]);

            $this->call([
                BlogPostCategoriesTableSeeder::class,
                BlogPostsTableSeeder::class,
                BlogPostImagesTableSeeder::class,
                BlogPostTagsTableSeeder::class,
                BlogPostBlogPostTagTableSeeder::class
            ]);
        }

        Schema::enableForeignKeyConstraints();

    }
}
