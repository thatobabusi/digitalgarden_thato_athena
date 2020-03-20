<?php
/**
 * Wanted to separate routes into specific files per entity/model being dealt with because of code smell
 * of 1000's of lines in routes/web.php files.
 * Use this to include all route files in the routes folder and any subdirectories
 */
/*if (! function_exists('include_route_files2')) {
    function include_route_files2($folder)
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
}*/
