<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Enabled?
    |--------------------------------------------------------------------------
    |
    | By default, Route Browser is only enabled in the 'local' environment,
    | and only when debugging is enabled.
    |
    */


    'enabled' => env('ROUTE_BROWSER_ENABLED', null),

    /*
    |--------------------------------------------------------------------------
    | Route Path
    |--------------------------------------------------------------------------
    |
    | The URI path where Route Browser will be accessible.
    | The default is /routes, but you can change it to avoid conflicts.
    |
    */

    'path' => env('ROUTE_BROWSER_PATH', null), //'routes',

    /*
    |--------------------------------------------------------------------------
    | Exclude Routes
    |--------------------------------------------------------------------------
    |
    | Paths to exclude from the list. May contain wildcards.
    |
    */

    'exclude' => [

        '/install', '/install/*',
        '/update', '/update/*',
        '/oauth', '/oauth/*',
        '/admin', '/admin/*', //Hide these to prevent people from knowing too much
        '/admin/developer-tools', '/admin/developer-tools/*', //Hide these to prevent people from knowing too much
        '/_debugbar/*', // https://github.com/barryvdh/laravel-debugbar
        '/_ignition/*', // https://github.com/facade/ignition
        '/horizon', '/horizon/*', // https://laravel.com/docs/horizon
        '/ignition-vendor/*', // https://flareapp.io/docs/ignition-for-laravel/third-party-extensions
        '/telescope', '/telescope/*', // https://laravel.com/docs/telescope
        '/tinker', // https://github.com/spatie/laravel-web-tinker
    ],

    // Exclude Route Browser's own routes?
    'exclude-self' => true,

];
