<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Social Media Links
    |--------------------------------------------------------------------------
    |
    | Will fine tune this further in the future
    |
    */

    'social_media' => [
        'Facebook' => [
            'title' => 'Facebook',
            'username' => env('FACEBOOK_ACCOUNT', '#'),
            'link' => env('FACEBOOK_ACCOUNT_LINK', '#'),
            'icon' => 'fa fa-facebook',
        ],
        'Twitter' => [
            'title' => 'Twitter',
            'username' => env('TWITTER_ACCOUNT', '#'),
            'link' => env('TWITTER_ACCOUNT_LINK', '#'),
            'icon' => 'fa fa-twitter',
        ],
        'Github' => [
            'title' => 'Github',
            'username' => env('GITHUB_ACCOUNT', '#'),
            'link' => env('GITHUB_ACCOUNT_LINK', '#'),
            'icon' => 'fa fa-github',
        ],
        'LinkedIn' => [
            'title' => 'LinkedIn',
            'username' => env('LINKEDIN_ACCOUNT', '#'),
            'link' => env('LINKEDIN_ACCOUNT_LINK', '#'),
            'icon' => 'fa fa-linkedin',
        ],
    ],

];
