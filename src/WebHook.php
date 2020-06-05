<?php

namespace LaravelEG\Laravel\AutoDeploy;

class WebHook
{
    public static function init()
    {
        require __DIR__.'/routes/web.php';
    }
}