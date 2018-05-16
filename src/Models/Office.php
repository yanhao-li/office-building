<?php

namespace Yanhaoli\OfficeBuilding\Models;

use Illuminate\Database\Eloquent\Model;
use Yanhaoli\OfficeBuilding\Traits\UseGlobalConnection;

class Office extends Model {
    use UseGlobalConnection;
    
    public function getTable(){
        $model = config('officebuilding.office_model');
        return new $model->getTable();
    }
    
}