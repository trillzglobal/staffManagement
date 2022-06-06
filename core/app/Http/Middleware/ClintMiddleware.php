<?php

namespace App\Http\Middleware;

use Closure;

class ClintMiddleware
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
        if(auth()->user()->role=="intern"){
            return $next($request);
        }
        else{
            return redirect()->back();
        }

    }
}
