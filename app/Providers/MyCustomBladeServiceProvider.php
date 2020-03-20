<?php

namespace App\Providers;

use App\Models\AccessControl\Plugin;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class MyCustomBladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('pluginIsEnabled', function ($expression) {

            $enabled = plugin_is_enabled($expression);

            return "<?php if ($enabled) { ?>";
        });

        Blade::directive('endPluginIsEnabled', function () {
            return '<?php } ?>';
        });
    }
}
