<?php

namespace Yanhaoli\OfficeBuilding\Models;

use Illuminate\Database\Eloquent\Model;
use Yanhaoli\OfficeBuilding\Traits\UseGlobalConnection;

class Office extends Model {
    use UseGlobalConnection;
    
    public function getTable(){
        return config('officebuilding.offices_table_name');
    }
    
}