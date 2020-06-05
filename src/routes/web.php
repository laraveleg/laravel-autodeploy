<?php
Route::group([
    'namespace' => '\LaravelEG\Laravel\AutoDeploy\App\Http\Controllers',
    'middleware' => [
        \LaravelEG\Laravel\AutoDeploy\App\Http\Middleware\GitLabMiddleware::class
    ]
], function () {
    Route::post('/deploy/{provider}', 'AutoDeployController@deploy');
});