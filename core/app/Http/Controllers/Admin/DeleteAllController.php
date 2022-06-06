<?php

namespace App\Http\Controllers\Admin;

use App\FileManagement;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DeleteAllController extends Controller
{
    public function delete(){
        FileManagement::truncate();
        Alert::success('success','All files are deleted successfully');
         return redirect()->back();
    }
}
