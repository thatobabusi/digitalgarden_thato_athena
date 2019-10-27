<?php

if (! function_exists('list_all_migrations')) {
    function list_all_migrations()
    {
        $var = getDirContents( base_path().'/database/migrations');
        $new = [];
        foreach($var as $v) {
            $v = str_replace("/home/vagrant/code/seams2/database/migrations/","",$v);
            if($v !== ".gitkeep") {
                array_push($new, $v);
            }
        }
        dd($new);
    }
}

