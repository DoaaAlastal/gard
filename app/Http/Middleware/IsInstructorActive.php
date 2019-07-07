<?php

namespace App\Http\Middleware;

use Closure;

class IsInstructorActive
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
        if (Auth::guard('instructor')->check()) {
            if(Auth::guard('instructor')->user()->is_active == 1)
                return $next($request);
            else{
                Auth::guard('instructor')->logout();
                return redirect('/error');

            }
        }

    }
}
