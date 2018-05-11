<?php
namespace Yanhaoli\OfficeBuilding\Providers;

use Illuminate\Support\ServiceProvider;
use Yanhaoli\OfficeBuilding\OfficeBuilding;

class OfficeBuildingServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../config/config.php' => config_path('officebuilding.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/config.php', 'officebuilding');
        $this->app->singleton('OfficeBuilding', function($app) {
            return new OfficeBuilding($app);
        });

        $this->app->bind('OfficeBuilding\Connection', 'Yanhaoli\OfficeBuilding\Database\Connection');
        $this->app->bind('OfficeBuilding\DatabaseManager', 'Yanhaoli\OfficeBuilding\Database\DatabaseManager');
        
    }
}
