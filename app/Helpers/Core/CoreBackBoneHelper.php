<?php

use App\Models\AccessControl\Plugin;

if (! function_exists('plugin_is_enabled')) {
    /**
     * @param $plugin_name
     *
     * @return bool
     */
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
    /**
     * @param $folder
     */
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
    /**
     * @param       $dir
     * @param array $results
     *
     * @return array
     */
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
    /**
     * @param $value
     *
     * @return string
     */
    function myEncryptFunction($value)
    {
        $encrypted = encrypt($value);
        $encrypted = Crypt::encrypt($encrypted);
        $encrypted = base64_encode($encrypted);

        return $encrypted;
    }
}

if (! function_exists('myDecryptFunction')) {
    /**
     * @param $value
     *
     * @return false|mixed|string
     */
    function myDecryptFunction($value)
    {
        $decrypted = base64_decode($value);
        $decrypted = Crypt::decrypt($decrypted);
        $decrypted = decrypt($decrypted);

        return $decrypted;
    }
}

if (! function_exists('core_helper_extend_timeout_time')) {
    function core_helper_extend_timeout_time()
    {
        # Override default php.ini max excution time
        set_time_limit(180);

        ini_set('max_execution_time', 0);
        ini_set('max_input_time ', 0);
        ini_set('memory_limit', '1024M');
        ini_set('post_max_size', '1024M');
        ini_set('upload_max_filesize', '1024M');
        ini_set('client_max_body_size', '1024M');
    }
}

if (! function_exists('random_pic')) {
    /**
     * @return mixed
     */
    function random_pic()
    {
        $dir = 'images/advertised_brand_images';
        $files = glob($dir . '/*.*');
        $file = array_rand($files);
        return $files[$file];
    }
}

/*
$base64String = "R0lGODdhAQABAPAAAP8AAAAAACwAAAAAAQABAAACAkQBADs";
$image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '',$base64String));
$FILE = time().rand(111111111, 999999999) . '.png';
*/

//dd($base64String);

