<?php

use Illuminate\Database\Seeder;

class ResumeSkillTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('resume_skill_types')->truncate();

        DB::table('resume_skill_types')->insert([
            'id' => '1',
            'title' => 'Technical',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);

        DB::table('resume_skill_types')->insert([
            'id' => '2',
            'title' => 'Professional',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);
    }
}
