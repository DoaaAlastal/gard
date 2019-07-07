<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdminActive
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

        if (Auth::guard('admin')->check()) {
            if(Auth::guard('admin')->user()->is_active == 1)
                return $next($request);
            else{
                Auth::guard('admin')->logout();
                return redirect('/error');

            }
        }

    }


}
