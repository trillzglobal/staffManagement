<?php

namespace App\Http\Controllers\Admin;

use App\FileManagement;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class FileManagementController extends Controller
{

    public function index()
    {
        $data['title'] = 'List of Files';
        $data ['files'] = FileManagement::whereHas('user')->with('user')->orderBy('id','DESC')->paginate(10);
        return view('admin.file-management.index',$data);
    }

    public function create()
    {
        $data['title'] = 'Add New File';
        $data['users'] = User::where('role','employee')->get();
        return view('admin.file-management.create',$data);
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'employee_id' => 'required'
        ]);

        $newFile = new FileManagement();

        $newFile->user_id = $request->employee_id;
        $newFile->title = $request->title;
        $newFile->description = $request->description;
        $newFile->sender_id = auth()->id();


        if ($request->hasFile('file')){

            $path = 'assets/files/uploads/';
            $f = $request->file('file');
            $file_name = rand(0000,9999).'-'.$f->getFilename().'.'.$f->getClientOriginalExtension();
            $f->move($path,$file_name);

            if ($newFile->files != null && file_exists($newFile->files)){
                unlink($newFile->files);
            }

            $newFile->files =  $file_name;

        }
        $newFile->save();
        Alert::toast('File Send successfully', 'success');
        return redirect()->route('file-management.index')->with($newFile->user_id);
    }

  
    public function destroy($id)
    {
        $file = FileManagement::findOrFail($id);
        $file_path = "assets/files/uploads/{$file->files}";

        if (FileManagement::exists($file_path)) {
            @unlink($file_path);
        }
        else{
            Alert::error('Error', 'file not exists');
        }

        FileManagement::destroy($id);

        Alert::toast('File Deleted successfully', 'info');
        return redirect()->route('file-management.index');
    }

    public function sendingList()
    {
        $data['title'] = 'Sending List of Files';
        $data ['files'] = FileManagement::whereHas('user')->with('user')->where('sender_id',auth()->id())->orderBy('id','DESC')->paginate(10);
        return view('admin.file-management.index',$data);
    }
    
    public function receivingList()
    {
        $data['title'] = 'Receiving List of Files';
        $data ['files'] = FileManagement::whereHas('user')->with('user')->where('user_id',auth()->id())->orderBy('id','DESC')->paginate(10);
        return view('admin.file-management.index',$data);
    }
}
