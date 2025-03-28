<?php

namespace App\Http\Middleware\install;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckedInstalled
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $installed_file = storage_path('app'. DIRECTORY_SEPARATOR .'installed.json');

        if(!file_exists($installed_file)) {
            return $next($request);

        } else {
            return redirect('/');

        }
    }
}
