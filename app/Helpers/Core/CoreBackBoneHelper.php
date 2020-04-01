<?php

use App\Models\AccessControl\Plugin;

if (! function_exists('plugin_is_enabled')) {
    function plugin_is_enabled($plugin_name)
    {
        $plugin = Plugin::whereTitle($plugin_name)->first();

        $enabled = false;

        if(isset($plugin) && $plugin->enabled === 1) {
            $enabled = true;
        }

        return $enabled;
    }
}

if (! function_exists('recursively_include_all_files')) {
    function recursively_include_all_files($folder)
    {
        try {
            $rdi = new recursiveDirectoryIterator($folder);
            $it = new recursiveIteratorIterator($rdi);

            while ($it->valid()) {
                if (!$it->isDot() && $it->isFile() && $it->isReadable() && $it->current()->getExtension() === 'php') {
                    require $it->key();
                }

                $it->next();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

if (! function_exists('getDirContents')) {
    function getDirContents($dir, &$results = array())
    {
        $files = scandir($dir);

        foreach($files as $key => $value){
            $path = realpath($dir.DIRECTORY_SEPARATOR.$value);
            if(!is_dir($path)) {
                $results[] = $path;
            } else if($value !== "." && $value !== "..") {
                getDirContents($path, $results);
                $results[] = $path;
            }
        }

        return $results;
    }
}

if (! function_exists('myEncryptFunction')) {
    function myEncryptFunction($value)
    {
        $base64String = encrypt($value);
        $base64String = Crypt::encrypt($base64String);
        $base64String = base64_encode($base64String);

        return $base64String;
    }
}

if (! function_exists('myDecryptFunction')) {
    function myDecryptFunction($value)
    {
        $base64String = base64_decode($value);
        $base64String = Crypt::decrypt($base64String);
        $base64String = decrypt($base64String);

        return $base64String;
    }
}

/*
$base64String = "R0lGODdhAQABAPAAAP8AAAAAACwAAAAAAQABAAACAkQBADs";
$image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '',$base64String));
$FILE = time().rand(111111111, 999999999) . '.png';
*/

//dd($base64String);

