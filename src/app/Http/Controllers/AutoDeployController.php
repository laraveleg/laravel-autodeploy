<?php

namespace LaravelEG\Laravel\AutoDeploy\App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use LaravelEG\Laravel\AutoDeploy\Config;
use LaravelEG\Laravel\AutoDeploy\app\Components\Exec;

class AutoDeployController extends Controller
{
    public function deploy(Request $request, Exec $exec, Config $config)
    {
        $commands = [
            'deploy' => $config['deploy']
        ];

        $commands = array_values(array_merge($commands, $config['tasks']));

        $outs = [];
        foreach ($commands as $command) {
            $out = $exec->cli($command);
            $outs[$command] = $out;
        }

        return $outs;
    }   
}