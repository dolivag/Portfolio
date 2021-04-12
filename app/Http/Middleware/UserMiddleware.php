<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserMiddleware
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

        /*if ($request->hasCookie('userName')) {
            echo '<nav class="navbar navbar-inverse" style="color: white;">';
            //echo $request->cookie('userName');
            echo '</nav>';
            return $next($request);
        }*/
        return $next($request);
    }
}
