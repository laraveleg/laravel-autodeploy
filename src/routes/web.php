<?php
Route::group([
    'prefix' => 'laraveleg',
    'namespace' => 'laraveleg\Laravel\AutoDeploy\app\Http\Controllers',
    'middleware' => [
        laraveleg\Laravel\AutoDeploy\app\Http\Middleware\GitLabMiddleware::class
    ]
], function () {
    Route::post('/deploy/{provider}', 'AutoDeployController@deploy');
});