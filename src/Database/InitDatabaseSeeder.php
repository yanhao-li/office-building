<?php
namespace Yanhaoli\OfficeBuilding\Database\Seeds;
use Illuminate\Database\Seeder;

class InitDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // $this->cleanDatabase();
      $this->call(TableColumnsTableSeeder::class);
    }

    private function cleanDatabase()
    {

      Schema::disableForeignKeyConstraints();

      $tableNames = Schema::getConnection()->getDoctrineSchemaManager()->listTableNames();
      $tableNames = array_diff($tableNames, ["migrations"]);
      foreach ($tableNames as $tableName)
      {
        DB::table($tableName)->truncate();
      }

      Schema::enableForeignKeyConstraints();

    }
}
