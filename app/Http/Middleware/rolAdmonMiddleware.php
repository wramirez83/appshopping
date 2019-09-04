<?php

namespace App\Http\Middleware;
use Auth;

use Closure;

class rolAdmonMiddleware
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
        $arr  =array_column(json_decode($_COOKIE['roles']), 'id');
      if(!in_array('1', $arr) || !in_array('6', $arr))
      {
        return $next($request);
      }
      else
      {
        return redirect('noAcceso');
      }
        
    }
}
