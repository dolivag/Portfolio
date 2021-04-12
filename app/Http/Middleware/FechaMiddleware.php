<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class FechaMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $mytime = now();
        echo $mytime->toDateTimeString();

        return $next($request);
    }
}
