<?php

use Illuminate\Database\Seeder;

class SystemPageCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('system_page_categories')->truncate();

        \DB::table('system_page_categories')->insert(array (
            0 =>
            array (
                'id' => 1,
                'title' => 'Frontend',
                'slug' => 'frontend',
                'type' => 'frontend',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => '2020-03-17 12:18:03',
            ),
            1 =>
            array (
                'id' => 2,
                'title' => 'Backend',
                'slug' => 'backend',
                'type' => 'backend',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => '2020-03-17 12:18:03',
            ),
        ));


    }
}
