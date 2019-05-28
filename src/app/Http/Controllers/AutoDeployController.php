<?php

namespace Komicho\Laravel\AutoDeploy\App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Komicho\Laravel\AutoDeploy\Config;
use Komicho\Laravel\AutoDeploy\app\Components\Exec;

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