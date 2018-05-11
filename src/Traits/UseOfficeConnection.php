<?php

namespace Yanhaoli\OfficeBuilding\Traits;

use OfficeBuilding;

trait UseOfficeConnection
{   
    public function belongsToOffice()
    {
        return OfficeBuilding::findOfficeByConnection($this->connection);
    }
}