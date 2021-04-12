<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class FechaControllerMiddleware
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
        $new_time = date("d-m-Y H:i:s", strtotime('+2 hours'));
        echo "<br>";
        echo "Dentro del controlador del catálogo. La fecha es: " . $new_time;
        return $next($request);
    }
}
