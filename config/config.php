<?php

return [
    'office_model' => \App\Company::class,

    //If you want a seperate database server to host all your offices, change following:
    'office_building_db' => [
        'host' => env('OFFICE_BUILDING_DB_HOST', 'DB_HOST'),
        'port' => env('OFFICE_BUILDING_DB_PORT', 'DB_PORT'),
        'username' => env('OFFICE_BUILDING_DB_USERNAME', 'DB_USERNAME'),
        'password' => env('OFFICE_BUILDING_DB_PASSWORD', 'DB_PASSWORD'),
    ],

    'global_connection' => env('DB_CONNECTION'),

    //Define the boilerplate of office structure
    'office_migrations_path' => database_path('migrations/officebuilding'),

    'company_definable_tables' => []
];