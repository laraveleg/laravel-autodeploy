<?php
Route::group([
    'prefix' => 'komicho',
    'namespace' => 'Komicho\Laravel\AutoDeploy\app\Http\Controllers',
    'middleware' => 'web'
], function () {
    Route::get('/deploy', 'AutoDeployController@deploy');
});