<?php

use Illuminate\Database\Seeder;

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
                'email_verified_at' => NULL,
                'password' => '$2y$10$HvSDJRBDVWwRd18qj5oaQOF0DBXqnZcyFJ4dJA8hcQGAfmyZ7xkei',
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Teacher',
                'email' => 'teacher@teacher.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$HvSDJRBDVWwRd18qj5oaQOF0DBXqnZcyFJ4dJA8hcQGAfmyZ7xkei',
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'Teacher 2',
                'email' => 'teacher2@teacher2.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$HvSDJRBDVWwRd18qj5oaQOF0DBXqnZcyFJ4dJA8hcQGAfmyZ7xkei',
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'Teacher 3',
                'email' => 'teacher3@teacher3.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$HvSDJRBDVWwRd18qj5oaQOF0DBXqnZcyFJ4dJA8hcQGAfmyZ7xkei',
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            4 =>
            array (
                'id' => 5,
                'name' => 'Teacher 4',
                'email' => 'teacher4@teacher4.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$HvSDJRBDVWwRd18qj5oaQOF0DBXqnZcyFJ4dJA8hcQGAfmyZ7xkei',
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            5 =>
            array (
                'id' => 6,
                'name' => 'Teacher 5',
                'email' => 'teacher5@teacher5.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$HvSDJRBDVWwRd18qj5oaQOF0DBXqnZcyFJ4dJA8hcQGAfmyZ7xkei',
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => '2020-03-05 08:29:30',
                'deleted_at' => '2020-03-05 08:29:30',
            ),
            6 =>
            array (
                'id' => 7,
                'name' => 'Student',
                'email' => 'student@student.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$HvSDJRBDVWwRd18qj5oaQOF0DBXqnZcyFJ4dJA8hcQGAfmyZ7xkei',
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            7 =>
            array (
                'id' => 8,
                'name' => 'Thato Babusi',
                'email' => 'thatobabusiofficial@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$mRFXzZw1u23z60usy3PU3Ojs4tNxueEG04PsR71GqkxdQy0JVIWza',
                'remember_token' => NULL,
                'created_at' => '2020-03-05 08:04:57',
                'updated_at' => '2020-03-05 08:04:57',
                'deleted_at' => NULL,
            ),
            8 =>
            array (
                'id' => 9,
                'name' => 'Scythe',
                'email' => 'sylentscythe@yahoo.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$Eb9znQZrssh6JY9uDYSdCu56MIEfATBxiXeicvZSJfvPrlcKNyUqe',
                'remember_token' => NULL,
                'created_at' => '2020-03-05 08:19:52',
                'updated_at' => '2020-03-05 08:29:30',
                'deleted_at' => '2020-03-05 08:29:30',
            ),
            9 =>
            array (
                'id' => 10,
                'name' => 'Student Test',
                'email' => 'student@org.coza',
                'email_verified_at' => NULL,
                'password' => '$2y$10$jOEJpncYxpgQan73Qtm7Y.eexvjRDaabjYk6SDb8pkRgt9Z2tuOlq',
                'remember_token' => NULL,
                'created_at' => '2020-03-05 08:24:18',
                'updated_at' => '2020-03-05 08:29:05',
                'deleted_at' => '2020-03-05 08:29:05',
            ),
        ));


    }
}
