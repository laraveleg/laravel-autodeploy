<?php

namespace Komicho\Laravel\app\Components;

class Process
{
    public function cli($command)
    {
        $output = shell_exec('cd '.storage_path('../') . ' &&'.$command);
        return $output;
    }
}