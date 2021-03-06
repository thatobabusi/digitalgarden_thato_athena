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
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'deleted_at' => null,
            ),
            1 =>
            array (
                'id' => 2,
                'title' => 'Backend',
                'slug' => 'backend',
                'type' => 'backend',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'deleted_at' => null,
            ),
        ));


    }
}
