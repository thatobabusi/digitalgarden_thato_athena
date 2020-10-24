<?php

use Illuminate\Database\Seeder;

class TestResumeSkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('resume_skills')->truncate();

        /** Tech */
        DB::table('resume_skills')->insert([
            'id' => 1,
            'resume_id' => 1,
            'resume_skill_type_id' => 1,
            'skill' => "PHP",
            'since' => "2013-05-01 00:00:00",
            'details' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);

        DB::table('resume_skills')->insert([
            'id' => 2,
            'resume_id' => 1,
            'resume_skill_type_id' => 1,
            'skill' => "Laravel",
            'since' => "2015-01-01 00:00:00",
            'details' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);

        DB::table('resume_skills')->insert([
            'id' => 3,
            'resume_id' => 1,
            'resume_skill_type_id' => 1,
            'skill' => "JavaScript",
            'since' => "2013-05-01 00:00:00",
            'details' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);

        DB::table('resume_skills')->insert([
            'id' => 4,
            'resume_id' => 1,
            'resume_skill_type_id' => 1,
            'skill' => "Laravel",
            'since' => "2015-01-01 00:00:00",
            'details' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);

        DB::table('resume_skills')->insert([
            'id' => 5,
            'resume_id' => 1,
            'resume_skill_type_id' => 1,
            'skill' => "MySQL",
            'since' => "2013-05-01 00:00:00",
            'details' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);

        DB::table('resume_skills')->insert([
            'id' => 6,
            'resume_id' => 1,
            'resume_skill_type_id' => 1,
            'skill' => "Object Oriented Design",
            'since' => "2013-05-01 00:00:00",
            'details' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);

        DB::table('resume_skills')->insert([
            'id' => 7,
            'resume_id' => 1,
            'resume_skill_type_id' => 1,
            'skill' => "MVC",
            'since' => "2013-05-01 00:00:00",
            'details' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);

        DB::table('resume_skills')->insert([
            'id' => 8,
            'resume_id' => 1,
            'resume_skill_type_id' => 1,
            'skill' => "Bootstrap",
            'since' => "2013-05-01 00:00:00",
            'details' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);

        DB::table('resume_skills')->insert([
            'id' => 9,
            'resume_id' => 1,
            'resume_skill_type_id' => 1,
            'skill' => "HTML",
            'since' => "2013-05-01 00:00:00",
            'details' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);

        DB::table('resume_skills')->insert([
            'id' => 10,
            'resume_id' => 1,
            'resume_skill_type_id' => 1,
            'skill' => "CSS",
            'since' => "2013-05-01 00:00:00",
            'details' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);

        /** Prof */
        DB::table('resume_skills')->insert([
            'id' => 11,
            'resume_id' => 1,
            'resume_skill_type_id' => 2,
            'skill' => "Effective communication",
            'since' => null,
            'details' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);

        DB::table('resume_skills')->insert([
            'id' => 12,
            'resume_id' => 1,
            'resume_skill_type_id' => 2,
            'skill' => "Team player",
            'since' => null,
            'details' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);

        DB::table('resume_skills')->insert([
            'id' => 13,
            'resume_id' => 1,
            'resume_skill_type_id' => 2,
            'skill' => "Strong problem solver",
            'since' => null,
            'details' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);

        DB::table('resume_skills')->insert([
            'id' => 14,
            'resume_id' => 1,
            'resume_skill_type_id' => 2,
            'skill' => "Good time management",
            'since' => null,
            'details' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);
    }
}
