<?php

namespace App\Http\Middleware;

use Closure;

class rolCoordinadorMiddleware
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
       $_arreglo = array_column(json_decode($_COOKIE['roles']), 'id');
       if(in_array('3', $_arreglo) || in_array('4', $_arreglo) || in_array('5', $_arreglo) || in_array('6', $_arreglo) || in_array('1', $_arreglo) )
       {
         return $next($request);
       }
       else
       {
         return redirect('noAcceso');
       }
     }
}
