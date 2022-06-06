<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DownloadController extends Controller
{
    public function download($file){
        if(file_exists('assets/files/uploads/'.$file)){
            $path =  'assets/files/uploads/'.$file;
            return response()->download($path);
        }
        Alert::toast('No File Found', 'error');
        return redirect()->back();
    }
}
