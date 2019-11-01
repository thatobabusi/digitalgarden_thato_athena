<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Build Frontend Naviation Menu Here
    |--------------------------------------------------------------------------
    |
    | Will fine tune this further in the future
    |
    */

    'main_navigation' => [
        'Home' => [
            'is_active' => true,
            'title' => "Home",
            'url_link' => "#",
            'route' => "#",
            'icon' => "#",
            'permissions' => true,
            'has_children' => true,
            'children' => [
                'Home 1' => [
                    'is_active' => false,
                    'title' => "Home 1",
                    'url_link' => "#",
                    'route' => "#",
                    'icon' => "#",
                    'permissions' => true,
                    'has_children' => false,
                    'children' => [
                        //
                    ]

                ],
                'Home 2' => [
                    'is_active' => false,
                    'title' => "Home 2",
                    'url_link' => "#",
                    'route' => "#",
                    'icon' => "#",
                    'permissions' => true,
                    'has_children' => false,
                    'children' => [
                        //
                    ]

                ],
                'Home 3'
            ]

        ],
        'About' => [
            'is_active' => false,
            'title' => "About",
            'url_link' => "#",
            'route' => "#",
            'icon' => "#",
            'permissions' => true,
            'has_children' => false,
            'children' => [],

        ],
        'Services' => [
            'is_active' => false,
            'title' => "Services",
            'url_link' => "#",
            'route' => "#",
            'icon' => "#",
            'permissions' => true,
            'has_children' => true,
            'children' => [
                'Services 1' => [
                    'is_active' => false,
                    'title' => "Services 1",
                    'url_link' => "#",
                    'route' => "#",
                    'icon' => "#",
                    'permissions' => true,
                    'has_children' => false,
                    'children' => [
                        //
                    ]

                ],
                'Services 2',
                'Services 3' => [
                    'is_active' => false,
                    'title' => "Services 1",
                    'url_link' => "#",
                    'route' => "#",
                    'icon' => "#",
                    'permissions' => true,
                    'has_children' => false,
                    'children' => [
                        //
                    ]

                ],
            ]

        ],
        'Portfolio' => [
            'is_active' => false,
            'title' => "Portfolio",
            'url_link' => "#",
            'route' => "#",
            'icon' => "#",
            'permissions' => true,
            'has_children' => true,
            'children' => [
                'Services 1' => [
                    'is_active' => false,
                    'title' => "Portfolio 1",
                    'url_link' => "#",
                    'route' => "#",
                    'icon' => "#",
                    'permissions' => true,
                    'has_children' => false,
                    'children' => [
                        //
                    ]

                ],
                'Portfolio 2',
                'Portfolio 3'
            ]

        ],
        'Blog' => [
            'is_active' => false,
            'title' => "Blog",
            'url_link' => "#",
            'route' => "#",
            'icon' => "#",
            'permissions' => true,
            'has_children' => true,
            'children' => [
                'Blog 1',
                'Blog 2',
                'Blog 3'
            ]

        ],
    ],

];
