<?php
namespace Yanhaoli\OfficeBuilding\Facades;

use Illuminate\Support\Facades\Facade;

class OfficeBuilding extends Facade
{
    protected static function getFacadeAccessor(){
        return 'OfficeBuilding';
    }
}