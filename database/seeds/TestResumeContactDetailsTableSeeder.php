<?php

use Illuminate\Database\Seeder;

class TestResumeContactDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('resume_contact_details')->truncate();

        DB::table('resume_contact_details')->insert([
            'id' => 1,
            'resume_id' => 1,
            'cell_number' => "+27 745190253",
            'email' => "thatobabusi@yahoo.com",
            'website' => "thatobabusi.co.za",
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);
    }
}
