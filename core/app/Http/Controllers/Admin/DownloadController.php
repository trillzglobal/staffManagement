<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
        public function download($file){
          
            return response()->download('assets/files/uploads/'.$file);
        }
}
