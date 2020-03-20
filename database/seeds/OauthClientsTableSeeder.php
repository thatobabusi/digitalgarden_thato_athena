<?php

use Illuminate\Database\Seeder;

class OauthClientsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('oauth_clients')->truncate();

        \DB::table('oauth_clients')->insert(array (
            0 =>
            array (
                'id' => 1,
                'user_id' => NULL,
                'name' => 'thatobabusi.co.za Personal Access Client',
                'secret' => 'KwFEcWyR2BCeEQy4EwiAG1jqod926vw3CkU2KY67',
                'redirect' => 'http://localhost',
                'personal_access_client' => 1,
                'password_client' => 0,
                'revoked' => 0,
                'created_at' => '2020-03-18 16:37:58',
                'updated_at' => '2020-03-18 16:37:58',
            ),
            1 =>
            array (
                'id' => 2,
                'user_id' => NULL,
                'name' => 'thatobabusi.co.za Password Grant Client',
                'secret' => 'EfFYDia0Wl98h9x48slAI3ljG3eASKp47Pbl8MHz',
                'redirect' => 'http://localhost',
                'personal_access_client' => 0,
                'password_client' => 1,
                'revoked' => 0,
                'created_at' => '2020-03-18 16:37:58',
                'updated_at' => '2020-03-18 16:37:58',
            ),
        ));


    }
}
