<?php

use Illuminate\Database\Seeder;

class TestResumeDevStackTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \DB::table('resume_dev_stack')->truncate();

        #1
        DB::table('resume_dev_stack')->insert([
            'id' => 1,
            'resume_id' => 1,
            'title' => "PHP",
            'icons' => '<i class="fab fa-php text-black"></i>',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);

        #2
        DB::table('resume_dev_stack')->insert([
            'id' => 2,
            'resume_id' => 1,
            'title' => "Laravel",
            'icons' => '<i class="fab fa-laravel text-black"></i>',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);

        #3
        DB::table('resume_dev_stack')->insert([
            'id' => 3,
            'resume_id' => 1,
            'title' => "Bootstrap",
            'icons' => '<i class="fab fa-bootstrap text-black"></i>',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);

        #4
        DB::table('resume_dev_stack')->insert([
            'id' => 4,
            'resume_id' => 1,
            'title' => "HTML & CSS",
            'icons' => '<i class="fab fa-html5 text-black"></i><i class="fab fa-css3-alt text-black"></i>',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);

        #5
        DB::table('resume_dev_stack')->insert([
            'id' => 5,
            'resume_id' => 1,
            'title' => "jQuery & JavaScript",
            'icons' => '<i class="fab fa-js-square text-black"></i>',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);

        #6
        DB::table('resume_dev_stack')->insert([
            'id' => 6,
            'resume_id' => 1,
            'title' => "Version Control",
            'icons' => '<i class="fab fa-github text-black"></i><i class="fab fa-gitkraken text-black"></i>',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);

        #7
        DB::table('resume_dev_stack')->insert([
            'id' => 7,
            'resume_id' => 1,
            'title' => "Atlassian",
            'icons' => '<i class="fab fa-atlassian text-black"></i>',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);

        #8
        DB::table('resume_dev_stack')->insert([
            'id' => 8,
            'resume_id' => 1,
            'title' => "Trello",
            'icons' => '<i class="fab fa-trello text-black"></i>',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);

        #9
        DB::table('resume_dev_stack')->insert([
            'id' => 9,
            'resume_id' => 1,
            'title' => "Slack",
            'icons' => '<i class="fab fa-slack text-black"></i>',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);

        #10
        DB::table('resume_dev_stack')->insert([
            'id' => 10,
            'resume_id' => 1,
            'title' => "Operating Systems",
            'icons' => '<i class="fab fa-windows text-black"></i><i class="fab fa-ubuntu text-black"></i><i class="fab fa-apple text-black"></i>',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);

        #11
        DB::table('resume_dev_stack')->insert([
            'id' => 11,
            'resume_id' => 1,
            'title' => "Adobe",
            'icons' => '<i class="fab fa-adobe text-black"></i>',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);
    }
}
