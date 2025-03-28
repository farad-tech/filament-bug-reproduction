<?php

namespace App\Http\Middleware;

use App\Models\Setting;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Symfony\Component\HttpFoundation\Response;

class PusherConfig
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $setting = new Setting();

        $PUSHER_APP_ID = $setting->where('slug', 'PUSHER_APP_ID')->first()->value ?? '';
        $PUSHER_APP_KEY = $setting->where('slug', 'PUSHER_APP_KEY')->first()->value ?? '';
        $PUSHER_APP_SECRET = $setting->where('slug', 'PUSHER_APP_SECRET')->first()->value ?? '';
        $PUSHER_APP_CLUSTER = $setting->where('slug', 'PUSHER_APP_CLUSTER')->first()->value ?? '';
        
        Config::set('broadcasting.connections.pusher.app_id', $PUSHER_APP_ID);
        Config::set('broadcasting.connections.pusher.key', $PUSHER_APP_KEY);
        Config::set('broadcasting.connections.pusher.secret', $PUSHER_APP_SECRET);
        Config::set('broadcasting.connections.pusher.options.cluster', $PUSHER_APP_CLUSTER);
        Config::set('broadcasting.connections.pusher.options.host', 'api-'.$PUSHER_APP_CLUSTER.'.pusher.com');

        return $next($request);
    }
}
