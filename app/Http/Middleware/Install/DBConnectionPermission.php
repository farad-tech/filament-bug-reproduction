<?php

namespace App\Http\Middleware\install;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DBConnectionPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   
        $detail_file = storage_path('app'. DIRECTORY_SEPARATOR .'detail-file.json');

        if(!file_exists($detail_file)) {
            return redirect()->route('install.basic-details');

        } else {
            return $next($request);

        }
    }
}
