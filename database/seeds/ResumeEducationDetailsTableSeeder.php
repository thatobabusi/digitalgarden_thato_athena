<?php

use Illuminate\Database\Seeder;

class ResumeEducationDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('resume_education_details')->truncate();

        DB::table('resume_education_details')->insert([
            'id' => 1,
            'resume_id' => 1,
            'qualification' => "Bachelor of Science (Honours), Business Information Technology",
            'school' => "Staffordshire University",
            'dates' => "2008 - 2012",
            'details' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);

        DB::table('resume_education_details')->insert([
            'id' => 2,
            'resume_id' => 1,
            'qualification' => "Foundation Degree",
            'school' => "Asia Pacific University of Technology and Innovation",
            'dates' => "2007 - 2008",
            'details' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);

        DB::table('resume_education_details')->insert([
            'id' => 3,
            'resume_id' => 1,
            'qualification' => "O-Level / BGCSE",
            'school' => "Mater Spei College",
            'dates' => "2005 - 2006",
            'details' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);

        DB::table('resume_education_details')->insert([
            'id' => 4,
            'resume_id' => 1,
            'qualification' => "Short Learning Programme in Computer Technician",
            'school' => "Boston City Campus & Business College",
            'dates' => "2015 - 2015",
            'details' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);
    }
}
