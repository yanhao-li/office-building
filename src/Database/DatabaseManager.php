<?php

namespace Yanhaoli\OfficeBuilding\Database;

use Yanhaoli\OfficeBuilding\Database\Connection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;

class DatabaseManager
{
    protected $connection;
    public function __construct(){
        $this->connection = app('OfficeBuilding\Connection');
    }

    public function create($database_name)
    {
        DB::connection('officebuilding')->statement("CREATE DATABASE {$database_name}");
        $this->initDatabase($database_name);
        $this->connection->changeDefault(config('officebuilding.global_connection'));
        return true;
    }

    public function initDatabase($database_name){
        $this->migrate($database_name);
        // $connection_name = $this->convertDatabaseToConnection($database_name);
        // $this->connection->config($connection_name);
        // Artisan::call('db:seed', [
        //     '--database' => $connection_name,
        //     '--class' => 'Yanhaoli\OfficeBuilding\Database\Seeds\InitDatabaseSeeder'
        // ]);
    }

    public function upgrade($database_name)
    {
        $this->migrate($database_name);
        $this->connection->changeDefault(config('officebuilding.global_connection'));
        return true;
    }

    public function destroy($database_name)
    {
        DB::connection('business')->statement("DROP DATABASE IF EXISTS {$database_name}");
    }

    public function migrate($database_name)
    {
        $connection_name = $this->convertDatabaseToConnection($database_name);
        $this->connection->config($connection_name);
        Artisan::call('migrate', [
            '--database' => $connection_name,
            '--path' => 'database/migrations/officebuilding'
        ]);
    }

    public function seed($database_name)
    {
        $connection_name = $this->convertDatabaseToConnection($database_name);
        $this->connection->config($connection_name);
        Artisan::call('db:seed', [
            '--database' => $connection_name,
            '--class' => 'BusinessDemoDataSeeder'
        ]);
    }

    public function generateDatabaseName($office_name, $office_id)
    {
        $office_name = str_replace(' ', '_', $office_name);
        $office_name = preg_replace('/[^A-Za-z0-9]/', '', $office_name);
        $database_name = $office_id.'_'.$office_name.'_'.time();
        return $database_name;
    }

    public function convertDatabaseToConnection($database_name)
    {
        return $database_name;
    }
}