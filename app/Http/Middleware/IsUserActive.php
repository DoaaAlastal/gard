<?php

namespace App\Http\Middleware;

use Closure;

class IsUserActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guard('user')->check()) {
            if(Auth::guard('user')->user()->is_active == 1)
                return $next($request);
            else{
                Auth::guard('user')->logout();
                return redirect('/error');

            }
        }

    }
}
