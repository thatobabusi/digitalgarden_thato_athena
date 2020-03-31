<?php

use Illuminate\Database\Seeder;
use App\Models\User\User;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('users')->truncate();

        \DB::table('users')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'email_verified_at' => \Carbon\Carbon::now(),
                'password' => '$2y$10$HvSDJRBDVWwRd18qj5oaQOF0DBXqnZcyFJ4dJA8hcQGAfmyZ7xkei',
                'remember_token' => NULL,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'deleted_at' => NULL,
            ),

            1 =>
            array (
                'id' => 2,
                'name' => 'Thato Babusi',
                'email' => 'thatobabusiofficial@gmail.com',
                'email_verified_at' => \Carbon\Carbon::now(),
                'password' => '$2y$10$mRFXzZw1u23z60usy3PU3Ojs4tNxueEG04PsR71GqkxdQy0JVIWza',
                'remember_token' => NULL,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'deleted_at' => NULL,
            ),

        ));

        $user = factory(User::class, 8)->create();
    }
}
