<?php

namespace Yanhaoli\OfficeBuilding\Traits;

use OfficeBuilding;
use App\Models\CompanyDefinedColumn;

trait UseCompanyDefinedColumn
{   

    public function companyDefinedColumns($office=null)
    {
        if(!$office){
            $office = $this->belongsToOffice();
        }
        $table_name = $this->getTable();
        return OfficeBuilding::setWorkingOffice($office->id, function() use ($table_name){
            return CompanyDefinedColumn::where('table_name', $table_name)->get();
        });
    }

    public function companyDefinedColumnsData()
    {
        $company_defined_columns = $this->companyDefinedColumns();
        $result = [];
        foreach($company_defined_columns as $company_defined_column){
            $column_name = $company_defined_column->column_name;
            $result[$column_name] = $this->$column_name;
        }
        return $result;
    }

    public function getCompanyColumnsDefinableAttribute()
    {
        return true;
    }
    

}