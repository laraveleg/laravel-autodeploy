<?php

namespace Komicho\Laravel\App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Komicho\Laravel\Config;
use Komicho\Laravel\app\Components\Process;

class AutoDeployController extends Controller
{
    public function deploy(Request $request, Process $process, Config $config)
    {
        return $process->cli('git pull '.$config['pull']['origin'].' '.$config['pull']['branch_remote']);
    }   
}