<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\EmployeeInfo;
use App\Department;
use App\Designation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'List of User';
        $data['users'] = User::orderBy('id', 'DESC')->get();
        return view('admin.user.index', $data);
    }

    public function userIndex()
    {

        $data['title'] = 'List of Inactive Users';
        $data['users'] = User::orderBy('id', 'DESC')->get();
        return view('admin.user.userIndex', $data);
    }
    //
    public function employeeInactiveList()
    {

        $user = User::latest()->get();

        return view('admin.user.userIndexList', compact('user'));
    }
    public function employeeRegistration()
    {

        $data['title'] = 'Add New User';

        $all_department = Department::all('dept_name');

        $all_designation = Designation::all('designation_name');

        return view('admin.user.userRegistration', compact('data', 'all_department', 'all_designation'));
    }




    
    protected function validator(array $data)
    {
        return Validator::make(
            $data,
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'user_type' => 'required|in:employee,admin'
            ],
        );
    }

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->user_type,
            'password' => Hash::make($request->password),
            'status' => 0
        ]);

        Alert::toast('User Added successfully', 'success');
        return redirect()->route('admin.userIndex');
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
        $user = User::findOrFail($id);
        $all_department = Department::latest()->get();
        $all_designation = Designation::latest()->get();
        return view('admin.user.edit', compact('user', 'all_department', 'all_designation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
            'status' => 'required'
        ]);
        $user = User::find($request->id);

        $user->name = $request->name;
        $user->email = $request->email;

        $user->role = $request->role;
        $user->status = $request->status;
        $user->save();

        $checkEmployeeInfo = EmployeeInfo::where('user_id', $request->id)->get();

        if ($request->status == 1) {
            EmployeeInfo::UpdateorCreate([
                'user_id' => $request->id,
            ]);
            Alert::toast('User Updated successfully', 'info');
            return redirect()->route('admin.inactive');
        }
        Alert::toast('User Updated successfully', 'info');
        return redirect()->route('admin.inactive');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        User::destroy($id);
        return true;
    }
}
