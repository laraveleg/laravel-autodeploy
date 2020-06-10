<?php

namespace LaravelEG\Laravel\AutoDeploy\App\Http\Middleware;

use Closure;
use LaravelEG\Laravel\AutoDeploy\Config;

class SecretTokenMiddleware
{
    public function __construct(Config $config)
    {
        $this->config = $config;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $secret_token = $request->route('secret_token');

        if ($secret_token !== $this->config['payload_token']) {
            return response('Not valid token provider.', 401);
        }

        return $next($request);
    }
}