<?php

use Illuminate\Database\Seeder;

class ResumeDevStackItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('resume_dev_stack_items')->truncate();

        foreach(['Plain PHP 5 - 7.4', 'MVC', 'OOP', 'CodeIgniter'] as $item) {
            #1
            DB::table('resume_dev_stack_items')->insert([
                'resume_dev_stack_id' => 1,
                'title' => "$item",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'deleted_at' => null,
            ]);
        }

        foreach(['Laravel 5.1 - 8.x', 'Composer', 'Homestead'] as $item) {
            #2
            DB::table('resume_dev_stack_items')->insert([
                'resume_dev_stack_id' => 2,
                'title' => "$item",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'deleted_at' => null,
            ]);
        }

        foreach(['Bootstrap 3','Bootstrap 4'] as $item) {
            #3
            DB::table('resume_dev_stack_items')->insert([
                'resume_dev_stack_id' => 3,
                'title' => "$item",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'deleted_at' => null,
            ]);
        }

        foreach(['HTML 4','HTML 5', 'CSS 3'] as $item) {
            #4
            DB::table('resume_dev_stack_items')->insert([
                'resume_dev_stack_id' => 4,
                'title' => "$item",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'deleted_at' => null,
            ]);
        }

        foreach(['jQuery','JavaScript'] as $item) {
            #5
            DB::table('resume_dev_stack_items')->insert([
                'resume_dev_stack_id' => 5,
                'title' => "$item",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'deleted_at' => null,
            ]);
        }

        foreach(['GitHub','Git Version Control','Tortoise SVN','Gitkraken'] as $item) {
            #6
            DB::table('resume_dev_stack_items')->insert([
                'resume_dev_stack_id' => 6,
                'title' => "$item",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'deleted_at' => null,
            ]);
        }

        foreach(['Atlassian Bitbucket','Atlassian Jira Project Management'] as $item) {
            #7
            DB::table('resume_dev_stack_items')->insert([
                'resume_dev_stack_id' => 7,
                'title' => "$item",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'deleted_at' => null,
            ]);
        }

        foreach(['Trello'] as $item) {
            #8
            DB::table('resume_dev_stack_items')->insert([
                'resume_dev_stack_id' => 8,
                'title' => "$item",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'deleted_at' => null,
            ]);
        }

        foreach(['Slack','Slack Integrations'] as $item) {
            #9
            DB::table('resume_dev_stack_items')->insert([
                'resume_dev_stack_id' => 9,
                'title' => "$item",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'deleted_at' => null,
            ]);
        }

        foreach(['Ubuntu 16.04 - 20.04','Windows 98 - 10','iOS'] as $item) {
            #10
            DB::table('resume_dev_stack_items')->insert([
                'resume_dev_stack_id' => 10,
                'title' => "$item",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'deleted_at' => null,
            ]);
        }

        foreach(['•Adobe Creative Suite','Adobe Photoshop'] as $item) {
            #11
            DB::table('resume_dev_stack_items')->insert([
                'resume_dev_stack_id' => 11,
                'title' => "$item",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'deleted_at' => null,
            ]);
        }

    }
}
