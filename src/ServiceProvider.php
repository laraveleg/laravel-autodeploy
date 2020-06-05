<?php

namespace LaravelEG\Laravel\AutoDeploy;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // $this->commands();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../laravel/publishes/config/autodeploy.php' => config_path('laraveleg/autodeploy.php'),
            __DIR__.'/../laravel/publishes/storage/afterDeploy.sh' => storage_path('laraveleg/afterDeploy.sh'),
        ]);
    }
}