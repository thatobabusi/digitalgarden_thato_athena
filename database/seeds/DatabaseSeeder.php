<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        $this->call([
            //Access Control and Users
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
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

        $this->call([
            SystemConfigPluginsTableSeeder::class,
            SystemPageCategoriesTableSeeder::class,
            SystemMenuItemsTableSeeder::class
        ]);

        $this->call(OauthClientsTableSeeder::class);

        Schema::enableForeignKeyConstraints();
    }
}
