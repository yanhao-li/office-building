<?php
namespace Yanhaoli\OfficeBuilding\Database\Seeds;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TableColumnsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $all_tables = DB::connection()->getDoctrineSchemaManager()->listTableNames();
        $tables = array_diff($all_tables, ['table_columns', 'products_images', 'orders_shares', 'migrations', 'roles_permissions', 'products_attributes', 'products_attachments']);
        foreach($tables as $table_name){
            $table_columns = DB::getSchemaBuilder()->getColumnListing($table_name);
            $sort_order = 0;
            foreach($table_columns as $column_name) {
                $column_type = DB::getDoctrineColumn($table_name, $column_name)->getType()->getName();
                $column_length = DB::getDoctrineColumn($table_name, $column_name)->getLength();
                DB::table('table_columns')->insert([
                    'table_name' => $table_name,
                    'column_name' => $column_name,
                    'column_type' => $column_type,
                    'is_default_column' => true,
                    'max_length' => $column_length,
                    'sort_order' => $sort_order
                ]);
                $sort_order = $sort_order + 100;
            }
        }

    }
}
