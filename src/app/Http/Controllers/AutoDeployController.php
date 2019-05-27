<?php

namespace Komicho\Laravel\AutoDeploy\App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Komicho\Laravel\AutoDeploy\Config;
use Komicho\Laravel\AutoDeploy\app\Components\Process;

class AutoDeployController extends Controller
{
    public function deploy(Request $request, Process $process, Config $config)
    {
        $commands = [
            'deploy' => $config['deploy']
        ];

        $commands = array_values(array_merge($commands, $config['tasks']));

        $outs = [];
        foreach ($commands as $command) {
            $out = $process->cli($command);
            $outs[$command] = $out;
        }

        return $outs;
    }   
}