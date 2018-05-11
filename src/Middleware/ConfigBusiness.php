<?php

namespace Yanhaoli\OfficeBuilding\Middleware;

use Tymon\JWTAuth\Facades\JWTAuth;
use Closure;

class ConfigBusiness
{
    public function handle($request, Closure $next)
    {

        return $next($request);
    }
}