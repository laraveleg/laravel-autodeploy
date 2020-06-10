<?php
Route::group([
    'namespace' => '\LaravelEG\Laravel\AutoDeploy\App\Http\Controllers',
    'middleware' => [
        \LaravelEG\Laravel\AutoDeploy\App\Http\Middleware\SecretTokenMiddleware::class
    ]
], function () {
    Route::post('/deploy/{secret_token}', 'AutoDeployController@deploy');
});