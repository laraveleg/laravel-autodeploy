<?php

namespace LaravelEG\Laravel\AutoDeploy\App\Http\Middleware;

use Closure;
use LaravelEG\Laravel\AutoDeploy\Config;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class LastCommitMiddleware
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
        $environment = \App::environment();

        $response = $next($request);

        $header_content_type = $response->headers->get('Content-Type');

        if (strpos($header_content_type, 'text/html') !== false) {
            if ($environment != 'production') {
                $last_commit = new Process(['git', 'log', '--format="%H"', '-n', '1']);
                $last_commit->setWorkingDirectory(base_path());
                $last_commit->run();
        
                $last_commit_time = new Process(['git', 'log', '-1', '--format=%cd']);
                $last_commit_time->setWorkingDirectory(base_path());
                $last_commit_time->run();
        
                $current_branch = new Process(['git', 'rev-parse', '--abbrev-ref', 'HEAD']);
                $current_branch->setWorkingDirectory(base_path());
                $current_branch->run();
        
                echo view('LaravelEG_AutoDeploy::git-bar')->with([
                    'last_commit' => $last_commit->getOutput(),
                    'last_commit_time' => $last_commit_time->getOutput(),
                    'current_branch' => $current_branch->getOutput()
                ]);
            }
        }

        return $response;
    }
}