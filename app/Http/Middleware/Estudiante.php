<?php

namespace App\Http\Middleware;

use Closure;

class Estudiante
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
        if(!Auth::guard($guard)->check()){
            return redirect('/');
        }

        if(Auth::User()->tipo == 'admin'){
            return redirect('/');
        }

        return $next($request);
    }
}
