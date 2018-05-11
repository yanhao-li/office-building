<?php

namespace Yanhaoli\OfficeBuilding;

use DB;
use Yanhaoli\OfficeBuilding\Models\Office;

class OfficeBuilding
{
    protected $app;
    protected $database_manager;
    protected $connection;

    public function __construct($app){
        $this->app = $app;
        $this->database_manager = $this->app->make('OfficeBuilding\DatabaseManager');
        $this->connection = $this->app->make('OfficeBuilding\Connection');
        $this->connection->init();
    }

    public function all()
    {
        return Office::all();
    }

    public function addOffice($office_name)
    {
        //insert the record to database
        $table_name = config('officebuilding.offices_table_name');
        $statement = DB::select("SHOW TABLE STATUS LIKE '".$table_name."'");
        $office_id = $statement[0]->Auto_increment;
        $database_name = $this->database_manager->generateDatabaseName($office_name, $office_id);
        $this->database_manager->create($database_name);
        return $database_name;
    }

    public function upgradeOffice($office_id)
    {
        $office = Office::findOrFail($office_id);
        $office_database = $office->database_name;
        $this->database_manager->upgrade($office_database);
        return true;
    }

    //Set the office will work on.
    public function visit($office_id, $cb = NULL)
    {
        $original_connection = $this->connection->get();
        $office = Office::findOrFail($office_id);
        $office_database = $office->database_name;
        $this->connection->changeDefault($office_database);
        if($cb){
            $result = $cb();
            $this->connection->changeDefault($original_connection);
            return $result;
        }
    }

    public function findOfficeByConnection($connection_name)
    {
        $database_name = $connection_name;
        $office = Office::where('database_name', $database_name)->first();
        return $office;
    }

    //Switch the connection back to global
    public function leaveOffice()
    {
        $this->connection->changeDefault(config('officebuilding.global_connection'));
    }

    public function seed($office_id)
    {
        $office = Office::findOrFail($office_id);
        $database_name = $office->database_name;
        $this->database_manager->seed($database_name);
    }

}