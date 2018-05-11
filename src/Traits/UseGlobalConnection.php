<?php

namespace Yanhaoli\OfficeBuilding\Traits;

trait UseGlobalConnection
{
    public function getConnectionName()
    {
        return config('officebuilding.global_connection');
    }
}