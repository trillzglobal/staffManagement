<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Exception;
use App\Department;
use App\Designation;
use App\EmployeeInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class EmployeeController extends Controller
{

    public function employeeIndex()
    {

        $data['title'] = 'List of Employees';

        $data['employees'] = User::orderBy('id', 'DESC')
            ->where('role', 'employee')
            ->orwhere('role', 'admin')
            ->get();

        return view('admin.manage-employee.employeeIndex', $data);
    }
    public function employeeEdit($id)
    {
        $profile =    User::with('emp_info')->where('id', $id)->first();
        $all_department = Department::all('dept_name');
        $all_designation = Designation::all('designation_name');

        return view('admin.manage-employee.employeeEdit', compact('profile', 'all_department', 'all_designation'));
    }

    public function employeeUpdate(Request $request, $id)
    {

        $edit_data = User::findOrFail($id);

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
                $nid->move('assets/images/employee/', $filename);
                uploadImage('assets/images/employee/', $edit_data->emp_info->nid_photo);
                array_push($nid_files, $filename);
            }
        } else {

            if ($edit_data->emp_info->nid_photo != null) {
                $nid_files = $edit_data->emp_info->nid_photo;
            } else {
                $nid_files = NULL;
            }
        }




        // CV PHOTO UPLOAD

        if ($request->cv != NULL) {
            $cv_files = [];
            foreach ($request->cv as $cv) {
                $filename = uniqid() . time() . '.' . $cv->getClientOriginalExtension();
                $cv->move('assets/images/employee/', $filename);
                uploadImage('assets/images/employee/', $edit_data->emp_info->cv);
                array_push($cv_files, $filename);
            }
        } else {

            if ($edit_data->emp_info->cv != null) {
                $cv_files = $edit_data->emp_info->cv;
            } else {
                $cv_files = NULL;
            }
        }


        // CERTIFICATE PHOTO UPLOAD

        if ($request->certificate != NULL) {
            $certificate_files = [];
            foreach ($request->certificate as $certificate) {
                $filename = uniqid() . time() . '.' . $certificate->getClientOriginalExtension();
                $certificate->move('assets/images/employee/', $filename);
                uploadImage('assets/images/employee/', $edit_data->emp_info->certificate);
                array_push($certificate_files, $filename);
            }
        } else {
            if ($edit_data->emp_info->certificate != null) {
                $certificate_files = $edit_data->emp_info->certificate;
            } else {
                $certificate_files = NULL;
            }
        }


        $edit_data->emp_info->user_id = $request->user_id;
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

        if ($request->full_name != null && $request->email != null) {
            $edit_data->name =  $request->full_name;
            $edit_data->email = $request->email;
            $edit_data->save();
        }

        Alert::toast('User Updated successfully', 'info');

        return redirect()->route('admin.employeeIndex');
    }
    public function employeeDisable($id)
    {
        $edit_data = User::find($id);
        if ($edit_data->status) {
            $edit_data->status = 0;
            $edit_data->update();
            Alert::toast('User Disable successfully', 'info');
            return true;
        } else {
            $edit_data->status = 1;
            $edit_data->update();
            Alert::toast('User Enable successfully', 'info');
            return true;
        }
    }


    public function EmployeeDelete(Request $request, $id)
    {
        $b = User::find($request->id);
        $b->projects()->detach();
        $b->tasks()->detach();
        $a = EmployeeInfo::where('user_id', $id)->first();
        try {
            if ($a->avatar) {
                @unlink('assets/files/uploads/' . $a->avatar);
            }
        } catch (Exception $mess) {
        }

        EmployeeInfo::where('user_id', $id)->delete();
        $b->delete();

        Alert::toast('Employee Deleted successfully', 'info');
        return true;
    }


    public function employeeView($id)
    {
        $profile = User::with('emp_info')->where('id', $id)->first();
        $all_department = Department::all('dept_name');
        $all_designation = Designation::all('designation_name');
        return view('admin.manage-employee.employeeprofile', compact('profile', 'all_department', 'all_designation'));
    }


    public function passwordChange($id)
    {
        $admin = User::findOrFail($id);
        return view('admin.manage-employee.passwordchange', compact('admin'));
    }

    public function passwordupdate(Request $request, $id)
    {
        $admin = User::findOrFail($id);
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:6|confirmed',
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


    public function nidDownload($id)
    {

        return response()->download('assets/images/employee/' . $id);
    }
}
