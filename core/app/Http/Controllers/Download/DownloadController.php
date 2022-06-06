<?php

namespace App\Http\Controllers\Download;


use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class DownloadController extends Controller
{

    public function fileDownload($file){
       if(file_exists('assets/images/employee/'.$file)){
           $path =  'assets/images/employee/'.$file;
           return response()->download($path);
       }
       Alert::toast('No File Found', 'error');
       return redirect()->back();
    }
}
