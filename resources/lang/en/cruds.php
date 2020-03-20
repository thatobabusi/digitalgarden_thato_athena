<?php

return [
    'developerTools' => [
        'title'          => 'Developer Tools',
        'title_singular' => 'Developer Tool',
    ],
    'blogManagement' => [
        'title'          => 'Blog Management',
        'title_singular' => 'Blog Management',
        'title_short'    => 'Blog',
    ],
    'blogPostsManagement' => [
        'title'          => 'Blog Posts',
        'title_singular' => 'Blog Post',
    ],
    'blogPostCategoriesManagement' => [
        'title'          => 'Blog Categories',
        'title_singular' => 'Blog Category',
    ],
    'blogPostTagsManagement' => [
        'title'          => 'Blog Tags',
        'title_singular' => 'Blog Tag',
    ],
    'blogPostImagesManagement' => [
        'title'          => 'Blog Images',
        'title_singular' => 'Blog Image',
    ],

    'userManagement' => [
        'title'          => 'User Management',
        'title_singular' => 'User Management',
        'title_short' => 'Users',
        'user_types'     => [
            'admin' => 'Admin Users',
            'all_users' => 'All Users',
            'all_other_user' => 'All Other Users',
        ],
    ],

    'accessControlManagement' => [
        'title'          => 'Access Control Management',
        'title_singular' => 'Access Control Management',
        'title_short'    => 'Access Control',
    ],

    'permission'     => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'title'             => 'Title',
            'title_helper'      => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],

    'role'           => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'title'              => 'Title',
            'title_helper'       => '',
            'permissions'        => 'Permissions',
            'permissions_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],

    'user'           => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => '',
            'name'                     => 'Name',
            'name_helper'              => '',
            'email'                    => 'Email',
            'email_helper'             => '',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => '',
            'password'                 => 'Password',
            'password_helper'          => '',
            'roles'                    => 'Roles',
            'roles_helper'             => '',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => '',
            'created_at'               => 'Created at',
            'created_at_helper'        => '',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => '',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => '',
            'class'                    => 'Class',
            'class_helper'             => '',
        ],
    ],

    'blogPost'           => [
        'title'          => 'Blog Posts',
        'title_singular' => 'Blog Post',
        'new_title'      => 'New Blog Post',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => '',
            'title'                     => 'Title',
            'title_helper'              => '',
            'slug'                      => 'Slug',
            'slug_helper'               => '',
            'author'                    => 'Author',
            'author_helper'             => '',
            'summary'                   => 'Summary',
            'summary_helper'            => '',
            'body'                      => 'Body Content',
            'body_helper'               => '',
            'category'                  => 'Category',
            'category_helper'           => '',
            'tags'                      => 'Tags',
            'tags_helper'               => '',
            'created_at'                => 'Created at',
            'created_at_helper'         => '',
            'updated_at'                => 'Updated at',
            'updated_at_helper'         => '',
            'deleted_at'                => 'Deleted at',
            'deleted_at_helper'         => '',
        ],
    ],
    'lesson'         => [
        'title'          => 'Lessons',
        'title_singular' => 'Lesson',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'teacher'           => 'Teacher',
            'teacher_helper'    => '',
            'weekday'           => 'Weekday',
            'weekday_helper'    => '',
            'start_time'        => 'Start Time',
            'start_time_helper' => '',
            'end_time'          => 'End Time',
            'end_time_helper'   => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
            'class'             => 'Class',
            'class_helper'      => '',
        ],
    ],
    'schoolClass'    => [
        'title'          => 'School Classes',
        'title_singular' => 'School Class',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Name',
            'name_helper'       => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
];