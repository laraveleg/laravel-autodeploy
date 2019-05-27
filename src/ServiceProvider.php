<?php

namespace Komicho\Laravel\AutoDeploy;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // 
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../laravel/publishes/config/autodeploy.php' => config_path('komicho/autodeploy.php'),
        ]);

        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
    }
}