<?php

use Illuminate\Database\Seeder;

class ResumeInterestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('resume_interests')->truncate();

        $array_items = ["Gaming", "Swimming", "Travelling", "Cooking", "A Braai Master of Note",
            "Digital Audio Production Enthusiast"];

        foreach($array_items as $item) {
            DB::table('resume_interests')->insert([
                'resume_id' => 1,
                'title' => "$item",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'deleted_at' => null,
            ]);
        }
    }
}
