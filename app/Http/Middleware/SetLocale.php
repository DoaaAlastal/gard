<?php

namespace App\Http\Middleware;

use Closure;
use App;
use Illuminate\Support\Facades\Session;


class SetLocale
{
    

    // ...
    public function handle($request, Closure $next)
    {
        App::setLocale(session('locale'));

        return $next($request);
    }
}
