<?php

namespace App\Http\Middleware;

use App\License as AppLicense;
use App\Models\License;
use Closure;
use Filament\Notifications\Notification;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RTLLicense
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        $approved = false;

        $license = License::first();

        if(!is_null($license)) {

            $licenseSender = new AppLicense;

            $licenseSender->setUsername($license->username);

            $licenseSender->setOrderId($license->order_id);

            $licenseSender->setProductId($license->product_id);

            $licenseSender->setDomain();

            $licenseSender->send();

            $error = $licenseSender->translateResponse();

            if(is_null($error)) {

                $approved = true;
            } else {

                $approved = false;
                
                Notification::make()
                    ->title($error)
                    ->danger()
                    ->send();
            }

            $url = "/admin/licenses/$license->id/edit";

        } else {

            $url = '/admin/licenses/create';

        }

        return $next($request);
        // return ($approved) ? $next($request) : redirect($url);
    }
}
