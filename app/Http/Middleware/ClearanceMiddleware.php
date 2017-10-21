<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
class ClearanceMiddleware {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /*if (!Auth::user()->hasPermissionTo('clients.index')) //If user does //not have this permission
        {
            abort('401');
        }
        elseif (!Auth::user()->hasPermissionTo('clients.edit')) //If user does //not have this permission
        {
            abort('401');
        }
        elseif (!Auth::user()->hasPermissionTo('clients.show')) //If user does //not have this permission
        {
            abort('401');
        }
        elseif (!Auth::user()->hasPermissionTo('clients.delete')) //If user does //not have this permission
        {
            abort('401');
        }

        return $next($request);*/
    }
}