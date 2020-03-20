<?php

/**
 * Found the project was not using migrations
 * Wanted to reverse engineer the existing schema to create migrations
 * However there were in excess of 100+ tables to be re-created and I had to keep repeating commands for each
 * Ran this function to list all the migrations needed
 */
if (! function_exists('list_all_migrations')) {
    function list_all_migrations()
    {
        $var = getDirContents( base_path().'/database/migrations');
        $new = [];

        foreach($var as $v) {
            $v = str_replace(base_path('app/database/migrations/'),"",$v);
            if($v !== ".gitkeep") {
                $new[] = $v;
            }
        }
        dd($new);
    }
}

