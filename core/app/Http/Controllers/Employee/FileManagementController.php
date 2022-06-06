<?php

namespace App\Http\Controllers\Employee;

use App\FileManagement;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class FileManagementController extends Controller
{

    public function index()
    {
        $data['title'] = 'Send File';
        $data['admin'] =  User::where('role' , 'admin')->get();
        return view('employee.file-management.create' , $data);

    }
    public function store(Request $request){

       
        $request -> validate([
            'title' => 'required',
            'file' =>  'mimes:jpg,png,zip,doc,pdf',
        ]);

        $fileManage = new FileManagement();

        $fileManage -> title = $request -> title;
        $fileManage -> description = $request -> description;
        $fileManage -> user_id = $request -> user_id;
        $fileManage -> sender_id =  auth()->id();

        if($request->hasfile('file')){
            $location = 'assets/files/uploads/';
            $file = $request->file('file');
            $unique_file_name = md5(time().rand()) . '.' . $file -> getClientOriginalExtension();
            $file->move($location,$unique_file_name);

            if($fileManage->files != null && file_exists($fileManage -> files)){
                unlink($fileManage -> files);
            }

            $fileManage -> files = $unique_file_name;
        }

        $fileManage -> save();

        Alert::success('Success' , 'Your file send to your Admin Successfully');

        return redirect()->back();
    }

    public function show($id){
        $data = User::join('file_management','users.id','=','file_management.user_id')->where('file_management.user_id',$id)
        ->get();

        return view('employee.file-management.index',compact('data'));
    }

    public function sendingList()
    {
        $data['title'] = 'Sending List of Files';
        $data  = FileManagement::whereHas('user')->with('user')->where('sender_id',auth()->id())->orderBy('id','DESC')->paginate(10);
        return view('employee.file-management.index',compact('data'));
    }
    
    public function receivingList()
    {
        $data['title'] = 'Receiving List of Files';
        $data  = FileManagement::whereHas('user')->with('user')->where('user_id',auth()->id())->orderBy('id','DESC')->paginate(10);
        return view('employee.file-management.index',compact('data'));
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

        Alert::toast('Files Deleted successfully', 'info');
        return redirect()->back();
    }
}
