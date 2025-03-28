<?php

namespace App\Http\Middleware\Install;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminUserPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $db_connection = storage_path('app'. DIRECTORY_SEPARATOR .'db-connection.json');

        if(!file_exists($db_connection)) {
            return redirect()->route('install.db-connection');
        } else {
            return $next($request);
        }

    }
}
