<?php

namespace App\Http\Middleware;

use App\Models\Profile;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LastActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        Profile::where('user_id', auth()->id())->update(['last_activity' => Carbon::now()]);

        return $next($request);
    }
}
