<?php

namespace App\Http\Middleware;

use Closure;

class Kepalayayasan
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
        if(Auth::user()->akses == 'kepalayayasan'){
            return $next($request);
        }
        return abort(404);
    }
}