<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {


        if(Auth::check()){
            if(auth()->user()->role== "admin"){
                if(auth()->user()->status == true){
                    return redirect()->route('admin.dashboard');
                }
            }
            if(auth()->user()->role=="employee"){
                if(auth()->user()->status == true){
                    return redirect('employee/dashboard');
                }
            }
        }
        return $next($request);

    }
}
