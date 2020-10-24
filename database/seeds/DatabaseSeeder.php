<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        #Get default stuff that is needed regardless
        $this->call([
            BlogPostStatussesTableSeeder::class,
            ImageTypesTableSeeder::class,
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,

            ResumeSkillTypesTableSeeder::class,

            SystemConfigPluginsTableSeeder::class,
            SystemPageCategoriesTableSeeder::class,
            SystemMenuItemsTableSeeder::class,
        ]);

        #Invoke Test Data Seeders
        if(app()->environment() === 'local') {

            #Users and roles
            $this->call([
                TestUsersTableSeeder::class,
                TestRoleUserTableSeeder::class,
            ]);

            #Blog
            $this->call([
                TestBlogPostCategoriesTableSeeder::class,
                TestBlogPostsTableSeeder::class,
                TestBlogPostImagesTableSeeder::class,
                TestBlogPostTagsTableSeeder::class,
                TestBlogPostBlogPostTagTableSeeder::class,
            ]);

            #Resume
            $this->call([
                TestResumesTableSeeder::class,
                TestResumeContactDetailsTableSeeder::class,
                TestResumeWorkDetailsTableSeeder::class,
                TestResumeEducationDetailsTableSeeder::class,
                TestResumeSkillsTableSeeder::class,
                TestResumeLicensesTableSeeder::class,
                TestResumeDevStackTableSeeder::class,
                TestResumeDevStackItemsTableSeeder::class,
                ResumeLanguagesTableSeeder::class,
                ResumeInterestsTableSeeder::class,
            ]);
        }

        #Invoke Real Data Seeders
        if(app()->environment() === 'production') {
            $this->call([
                UsersTableSeeder::class,
                RoleUserTableSeeder::class,
            ]);

            #Blog
            $this->call([
                BlogPostCategoriesTableSeeder::class,
                BlogPostsTableSeeder::class,
                BlogPostImagesTableSeeder::class,
                BlogPostTagsTableSeeder::class,
                BlogPostBlogPostTagTableSeeder::class,
            ]);

            #Resume
            $this->call([
                ResumesTableSeeder::class,
                ResumeContactDetailsTableSeeder::class,
                ResumeWorkDetailsTableSeeder::class,
                ResumeEducationDetailsTableSeeder::class,
                ResumeSkillsTableSeeder::class,
                ResumeLicensesTableSeeder::class,
                ResumeLanguagesTableSeeder::class,
                ResumeInterestsTableSeeder::class,
                ResumeDevStackTableSeeder::class,
                ResumeDevStackItemsTableSeeder::class,
            ]);
        }

        Schema::enableForeignKeyConstraints();

    }
}
