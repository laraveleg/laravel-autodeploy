<?php

namespace LaravelEG\Laravel\AutoDeploy\app\Components;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class Exec
{
    public function cli($command)
    {
        $command = 'cd '.storage_path('../') . ' && '.$command;
        $process = new Process($command);
        $process->run();
        // executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
        return $process->getOutput();
    }
}