<?php

namespace App\Http\Controllers\Employee;

use App\User;
use App\Department;
use App\Designation;
use App\EmployeeInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{

    public function index()
    {
        $id =  Auth::user()->id;
        $all_profile = EmployeeInfo::where('user_id', $id)->first();
        $all_department = Department::all('dept_name');

        $all_designation = Designation::all('designation_name');

        return view('employee.profile.profile', compact('all_profile', 'all_department', 'all_designation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = User::where('id', $id)->first();
        $all_department = Department::all('dept_name');

        $all_designation = Designation::all('designation_name');

        return view('employee.profile.profileEdit', compact('profile', 'all_department', 'all_designation'));
    }

    public function update(Request $request, $id)
    {

        $edit_data = User::where('id', $id)->firstOrFail();

        $user = User::where('id' ,'!=' , $edit_data->id)->pluck('email')->toArray();

    
        if(in_array($request->email, $user)){
            Alert::error('error', 'Already has a email');
            return redirect()->route('employee.profile');
        }


        if ($request->hasFile('photo')) {
            $edit_img = $request->file('photo');
            $edit_photo_uname = md5(time() . rand()) . '.' . $edit_img->getClientOriginalExtension();
            $edit_img->move('assets/files/uploads/', $edit_photo_uname);
            if ($edit_data->emp_info->avatar != Null) {
                @unlink('assets/files/uploads/' . $edit_data->emp_info->avatar);
            }
        } else {
            if ($edit_data->emp_info->avatar != null) {
                $edit_photo_uname = $edit_data->emp_info->avatar;
            } else {
                $edit_photo_uname = '';
            }
        }


        if ($request->nid_photo != NULL) {
            $nid_files = [];
            foreach ($request->nid_photo as $nid) {
                $filename = uniqid() . time() . '.' . $nid->getClientOriginalExtension();
                $nid->move('assets/files/uploads/', $filename);
                uploadImage('assets/files/uploads/', $edit_data->emp_info->nid_photo);
                array_push($nid_files, $filename);
            }
        } else {

            if ($edit_data->emp_info->nid_photo != null) {
                $nid_files = $edit_data->emp_info->nid_photo;
            } else {
                $nid_files = NULL;
            }
        }


        if ($request->cv != NULL) {
            $cv_files = [];
            foreach ($request->cv as $cv) {
                $filename = uniqid() . time() . '.' . $cv->getClientOriginalExtension();
                $cv->move('assets/files/uploads/', $filename);
                uploadImage('assets/files/uploads/', $edit_data->emp_info->cv);
                array_push($cv_files, $filename);
            }
        } else {

            if ($edit_data->emp_info->cv != null) {
                $cv_files = $edit_data->emp_info->cv;
            } else {
                $cv_files = NULL;
            }
        }



        if ($request->certificate != NULL) {
            $certificate_files = [];
            foreach ($request->certificate as $certificate) {
                $filename = uniqid() . time() . '.' . $certificate->getClientOriginalExtension();
                $certificate->move('assets/files/uploads/', $filename);
                uploadImage('assets/files/uploads/', $edit_data->emp_info->certificate);
                array_push($certificate_files, $filename);
            }
        } else {
            if ($edit_data->emp_info->certificate != null) {
                $certificate_files = $edit_data->emp_info->certificate;
            } else {
                $certificate_files = NULL;
            }
        }


        $edit_data->emp_info->user_id = $id;
        $edit_data->emp_info->avatar = $edit_photo_uname;
        $edit_data->emp_info->full_name = $request->full_name;
        $edit_data->emp_info->contact = $request->contact;
        $edit_data->emp_info->emergency_contact = $request->emergency_contact;
        $edit_data->emp_info->age = $request->age;
        $edit_data->emp_info->gender = $request->gender;
        $edit_data->emp_info->dob = $request->dob;
        $edit_data->emp_info->salary = $request->salary;
        $edit_data->emp_info->nid = $request->nid;
        $edit_data->emp_info->present_address = $request->present_address;
        $edit_data->emp_info->permanent_address = $request->permanent_address;
        $edit_data->emp_info->joining_date = $request->joining_date;
        $edit_data->emp_info->department = $request->department;
        $edit_data->emp_info->designation = $request->designation;
        $edit_data->emp_info->shift = $request->shift;
        $edit_data->emp_info->marital_status = $request->marital_status;
        $edit_data->emp_info->nid_photo = $nid_files;
        $edit_data->emp_info->cv = $cv_files;
        $edit_data->emp_info->certificate = $certificate_files;
        $edit_data->emp_info->push();

        $edit_data->name  = $request->full_name;
        $edit_data->email = $request->email;
        $edit_data->save();

        Alert::success('Success', 'Profile Updated Successfully');
        return redirect()->route('employee.profile');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function passwordChange($id)
    {
        $admin = User::findOrFail($id);
        return view('employee.profile.passwordchange', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function passwordupdate(Request $request, $id)
    {
        $admin = User::findOrFail($id);
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $hashedPassword = $admin->password;

        if (Hash::check($request->old_password, $hashedPassword)) {
            if (!Hash::check($request->newpassword, $hashedPassword)) {
                $admin->password = bcrypt($request->password);
                $admin->save();
                Alert::success('Success', 'Password Update Succeefully!');
                return redirect()->back();
            } else {
                Alert::error('Error', 'New password can not be the old password!');
                return redirect()->back();
            }
        } else {
            Alert::error('Error', 'Old Password not matched!');
            return redirect()->back();
        }
    }
}
