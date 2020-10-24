<?php

use Illuminate\Database\Seeder;

class ResumeLicensesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('resume_licenses')->truncate();

        DB::table('resume_licenses')->insert([
            'id' => 1,
            'resume_id' => 1,
            'qualification' => "Computer Technician",
            'school' => "Boston City Campus & Business College",
            'dates' => "2015",
            'details' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);

        DB::table('resume_licenses')->insert([
            'id' => 2,
            'resume_id' => 1,
            'qualification' => "CompTIA A+ ce",
            'school' => "Comptia",
            'dates' => "2015",
            'details' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);
    }
}
