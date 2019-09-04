<?php

namespace App\Http\Middleware;

use Closure;

class rolAlmancenMiddleware
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
        $_rol = array_column(json_decode($_COOKIE['roles']), 'id');
        if(in_array('3', $_rol) || in_array('1', $_rol))
        {
            return $next($request);
        }
        else
        {
            return redirect('noAcceso');
        }
    }
}
