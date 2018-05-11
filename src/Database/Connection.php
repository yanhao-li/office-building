<?php

namespace Yanhaoli\OfficeBuilding\Database;

use Illuminate\Database\DatabaseManager;
use Illuminate\Support\Facades\DB;


class Connection
{
    private $connection;
    protected $db;

    public function __construct(DatabaseManager $db){
        $this->db = $db;
    }

    public function get()
    {
        return $this->connection;
    }

    //Config the orcasmart connection
    public function init()
    {
        $office_building_db_setting = config('officebuilding.office_building_db');
        $connection = [
            'driver' => 'mysql',
            'host' => $office_building_db_setting['host'],
            'port' => $office_building_db_setting['port'],
            'username' => $office_building_db_setting['username'],
            'password' => $office_building_db_setting['password'],
            'database' => '',
            'unix_socket' => '',
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ];
        config(['database.connections.officebuilding' => $connection]);

        $this->connection = "officebuilding";

    }

    //Config the connection on fly
    public function config($connection_name)
    {
        $office_building_db_setting = config('officebuilding.office_building_db');
        $connection = [
            'driver' => 'mysql',
            'host' => $office_building_db_setting['host'],
            'port' => $office_building_db_setting['port'],
            'username' => $office_building_db_setting['username'],
            'password' => $office_building_db_setting['password'],
            'unix_socket' => '',
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ];

        $database_name = $connection_name;
        $connection['database'] = $database_name;
        config(['database.connections.'.$connection_name => $connection]);
        $this->connection = $connection_name;
    }

    public function changeDefault($connection_name)
    {
        $this->config($connection_name);
        config(['database.default' => $this->connection]);
    }

}