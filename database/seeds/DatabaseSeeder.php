<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        //$this->call([BlogPostBlogPostTagTableSeeder::class]);
        //$this->call([BlogPostImagesTableSeeder::class]);


        $this->call([
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            UsersTableSeeder::class,
            RoleUserTableSeeder::class,
        ]);

        $this->call([
            BlogPostStatussesTableSeeder::class,
            BlogPostCategoriesTableSeeder::class,
            BlogPostsTableSeeder::class,
            BlogPostImagesTableSeeder::class,
            BlogPostTagsTableSeeder::class,
            BlogPostBlogPostTagTableSeeder::class
        ]);

        $this->call([
            SystemConfigPluginsTableSeeder::class,
            SystemPageCategoriesTableSeeder::class,
            SystemMenuItemsTableSeeder::class
        ]);

        Schema::enableForeignKeyConstraints();

    }
}
