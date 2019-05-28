<?php

namespace Komicho\Laravel\AutoDeploy\App\Http\Middleware;

use Closure;
use Komicho\Laravel\AutoDeploy\Config;

class GitLabMiddleware
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
        $provider = $request->route('provider');

        if ($provider === 'gitlab') {
            if ($request->header('X-Gitlab-Token') !== $this->config['payload_token']) {
                return response('Not valid token provider.', 401);
            }
            return $next($request);
        }
        
        return response('Unknown provider', 401);
    }
}