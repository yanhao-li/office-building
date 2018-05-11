<?php

return [
    'office_model' => \App\Models\Company::class,

    //Define the office building location
    'office_building_db' => [
        'host' => env('OFFICE_BUILDING_DB_HOST', 'DB_HOST'),
        'port' => env('OFFICE_BUILDING_DB_PORT', 'DB_PORT'),
        'username' => env('OFFICE_BUILDING_DB_USERNAME', 'DB_USERNAME'),
        'password' => env('OFFICE_BUILDING_DB_PASSWORD', 'DB_PASSWORD'),
    ],

    'offices_table_name' => 'companies',

    'global_connection' => env('DB_CONNECTION'),

    //Define the structure of all office floor
    'office_migrations_path' => database_path('migrations/officebuilding'),

    'company_definable_tables' => ['products', 'orders', 'order_items', 'order_item_shippings', 'companies']
];