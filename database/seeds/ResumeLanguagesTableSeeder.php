<?php

use Illuminate\Database\Seeder;

class ResumeLanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('resume_languages')->truncate();

        DB::table('resume_languages')->insert([
            'resume_id' => 1,
            'language' => "English",
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);

        DB::table('resume_languages')->insert([
            'resume_id' => 1,
            'language' => "Setswana",
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);

        DB::table('resume_languages')->insert([
            'resume_id' => 1,
            'language' => "Northern Sotho",
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);

        DB::table('resume_languages')->insert([
            'resume_id' => 1,
            'language' => "Southern Sotho",
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);
    }
}
