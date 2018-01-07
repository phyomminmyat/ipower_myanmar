<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Menus Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in menu items throughout the system.
    | Regardless where it is placed, a menu item can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'backend' => [
        'access' => [
            'title' => 'Access Management',

            'roles' => [
                'all'        => 'All Roles',
                'create'     => 'Create Role',
                'edit'       => 'Edit Role',
                'management' => 'Role Management',
                'main'       => 'Roles',
            ],

            'users' => [
                'all'             => 'All Users',
                'change-password' => 'Change Password',
                'create'          => 'Create User',
                'deactivated'     => 'Deactivated Users',
                'deleted'         => 'Deleted Users',
                'edit'            => 'Edit User',
                'main'            => 'Users',
                'view'            => 'View User',
            ],

            'permission' => [
                'all'        => 'All Permissions',
                'create'     => 'Create Permission',
                'edit'       => 'Edit Permission',
                'management' => 'Permission Management',
                'main'       => 'Permissions',
            ],

        ],

        'nric_codes' => [
            'all'             => 'All Nric Codes',
            'management'      => 'Nric Code Management',
            'create'          => 'Create Nric Code',
            'edit'            => 'Edit Nric Code',
            'main'            => 'Nric Codes',
            'view'            => 'View Nric Code',
        ],

        'nric_township' => [
            'all'             => 'All Nric Townships',
            'create'          => 'Create Nric Township',
            'edit'            => 'Edit Nric Township',
            'main'            => 'Nric Townships',
            'view'            => 'View Nric Township',
        ],

        'region' => [
            'all'             => 'All Regions',
            'create'          => 'Create Region',
            'edit'            => 'Edit Region',
            'main'            => 'Regions',
            'view'            => 'View Region',
        ],

        'district' => [
            'all'             => 'All Districts',
            'create'          => 'Create District',
            'edit'            => 'Edit District',
            'main'            => 'Districts',
            'view'            => 'View District',
        ],

        'township' => [
            'all'             => 'All Townships',
            'create'          => 'Create Township',
            'edit'            => 'Edit Township',
            'main'            => 'Townships',
            'view'            => 'View Township',
        ],

        'village_tract' => [
            'all'             => 'All Villages',
            'create'          => 'Create Village',
            'edit'            => 'Edit Village',
            'main'            => 'Villages',
            'view'            => 'View Village',
        ],

        'community' => [
            'all'             => 'All Communities',
            'create'          => 'Create Community',
            'edit'            => 'Edit Community',
            'main'            => 'Community',
            'view'            => 'View Community',
        ],

        'department' => [
            'all'             => 'All Departments',
            'create'          => 'Create Department',
            'edit'            => 'Edit Department',
            'main'            => 'Departments',
            'view'            => 'View Department',
        ],

        'civil_servant' => [
            'all'             => 'All Civil Servants',
            'create'          => 'Create Civil Servant',
            'edit'            => 'Edit Civil Servant',
            'main'            => 'Civil Servants',
            'view'            => 'View Civil Servant',
        ],


        'meter_owner' => [
            'all'             => 'All Meter Owners',
            'create'          => 'Create Meter Owner',
            'edit'            => 'Edit Meter Owner',
            'main'            => 'Meter Owners',
            'view'            => 'View Meter Owner',
        ],

        'meter' => [
            'all'             => 'All Meters',
            'create'          => 'Create Meter',
            'deleted'         => 'Deleted Meter',
            'edit'            => 'Edit Meter',
            'main'            => 'Meters',
            'view'            => 'View Meter',
        ],

        'meter_unit' => [
            'all'             => 'All Meter Units',
            'create'          => 'Create Meter Unit',
            'deleted'         => 'Deleted Meter Unit',
            'edit'            => 'Edit Meter Unit',
            'main'            => 'Meter Units',
            'view'            => 'View Meter Unit',
        ],

        'unit_rate' => [
            'all'             => 'All Meter Unit Rates',
            'create'          => 'Create Meter Unit Rate',
            'deleted'         => 'Deleted Meter Unit Rate',
            'edit'            => 'Edit Meter Unit Rate',
            'main'            => 'Meter Unit Rates',
            'view'            => 'View Meter Unit Rate',
        ],

        'street' => [
            'all'             => 'All Communities',
            'create'          => 'Create Street',
            'edit'            => 'Edit Street',
            'main'            => 'Street',
            'view'            => 'View Street',
        ],

        'log-viewer' => [
            'main'      => 'Log Viewer',
            'dashboard' => 'Dashboard',
            'logs'      => 'Logs',
        ],

        'sidebar' => [
            'dashboard' => 'Dashboard',
            'general'   => 'General',
            'system'    => 'System',
        ],
    ],

    'language-picker' => [
        'language' => 'Language',
        /*
         * Add the new language to this array.
         * The key should have the same language code as the folder name.
         * The string should be: 'Language-name-in-your-own-language (Language-name-in-English)'.
         * Be sure to add the new language in alphabetical order.
         */
        'langs' => [
            'ar'    => 'Arabic',
            'zh'    => 'Chinese Simplified',
            'zh-TW' => 'Chinese Traditional',
            'da'    => 'Danish',
            'de'    => 'German',
            'el'    => 'Greek',
            'en'    => 'English',
            'es'    => 'Spanish',
            'fr'    => 'French',
            'id'    => 'Indonesian',
            'it'    => 'Italian',
            'ja'    => 'Japanese',
            'nl'    => 'Dutch',
            'pt_BR' => 'Brazilian Portuguese',
            'ru'    => 'Russian',
            'sv'    => 'Swedish',
            'th'    => 'Thai',
            'tr'    => 'Turkish',
        ],
    ],
];
