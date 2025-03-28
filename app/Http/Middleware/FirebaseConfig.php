<?php

namespace App\Http\Middleware;

use App\Models\Setting;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Symfony\Component\HttpFoundation\Response;

class FirebaseConfig
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $setting = new Setting();
        
        $FIREBASE_DATABASE_URL = $setting->where('slug', 'FIREBASE_DATABASE_URL')->first()->value ?? '';

        Config::set('firebase.projects.app.database.url', $FIREBASE_DATABASE_URL);

        return $next($request);
    }
}
