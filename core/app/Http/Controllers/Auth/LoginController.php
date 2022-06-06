<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{


    use AuthenticatesUsers;



    public function redirectTo()
    {


        if (auth()->user()->role == 'admin') {

            return 'admin/dashboard';
        } else if (auth()->user()->role == 'employee') {
            return 'employee/dashboard';
        } else if (auth()->user()->role == 'client') {
            return 'client/dashboard';
        } else {

            return 'login';
        }
    }















    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
    }


    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return ['email' => $request->{$this->username()}, 'password' => $request->password, 'status' => '1'];
    }
}
