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

