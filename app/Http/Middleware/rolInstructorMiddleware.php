<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class rolInstructorMiddleware
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
      if(in_array('2', array_column(json_decode($_COOKIE['roles']), 'id')) || in_array('1', array_column(json_decode($_COOKIE['roles']), 'id')))
      {
        return $next($request);
      }
      else
      {
       return redirect('noAcceso'); 
      }
    }
}
