<?php
Route::group([
    'prefix' => 'komicho',
    'namespace' => 'Komicho\Laravel\AutoDeploy\app\Http\Controllers',
    'middleware' => [
        Komicho\Laravel\AutoDeploy\app\Http\Middleware\GitLabMiddleware::class
    ]
], function () {
    Route::post('/deploy/{provider}', 'AutoDeployController@deploy');
});