<?php

namespace LaravelEG\Laravel\AutoDeploy\App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use LaravelEG\Laravel\AutoDeploy\Config;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class AutoDeployController extends Controller
{
    public function deploy(Request $request, Config $config)
    {
        $response = [];
        // deploy
        $deploy = new Process($config['deploy']);
        $deploy->setWorkingDirectory(base_path());
        $deploy->run();
        $response['deploy'] = $deploy->getOutput();

        // After deploy
        if (file_exists(storage_path('laraveleg/afterDeploy.sh'))) {
            $afterDeploy = new Process(['bash', 'storage/laraveleg/afterDeploy.sh']);
            $afterDeploy->setWorkingDirectory(base_path());
            $afterDeploy->run();
            $response['after_deploy'] = 'Orders were executed';
        } else {
            $response['after_deploy'] = 'File not found: `storage/laraveleg/afterDeploy.sh`';
        }
        
        return $response;
    }   
}