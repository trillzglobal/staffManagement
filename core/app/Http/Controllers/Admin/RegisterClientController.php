<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class RegisterClientController extends Controller
{
    public function show(){

            $data ['singleClient'] = User::where('role','client')->get();
            return view('admin.register-client.index',$data);
    }
}
