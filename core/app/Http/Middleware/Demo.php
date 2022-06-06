<?php

namespace App\Http\Middleware;

use Closure;
use RealRashid\SweetAlert\Facades\Alert;

class Demo
{
   
    public function handle($request, Closure $next)
    {
       
        if($request->method() == 'GET'){

            return $next($request);
        }

    
        return back()->withDemo(['config'=>'sdfsdfsdfds']);
    }
}
