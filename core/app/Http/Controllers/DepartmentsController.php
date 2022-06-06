<?php

namespace App\Http\Controllers;

use File;
use App\Course;
use App\EduDepartment;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class DepartmentsController extends Controller
{
   
    public function index()
    {
        $departments = EduDepartment::orderBy('id', 'desc')->paginate();

        return view('departments.index', compact('departments'));
    }

   
    public function create()
    {
        
        return view('departments.create');
    }

   
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'description' => 'nullable',
            ]
        );

        $department = new EduDepartment();
        $department->name = $request->name;
        $department->description = $request->description;
        $department->save();

        Alert::toast('Department Updated successfully', 'success');
        return redirect()->route('department.index');
    }



    public function edit($id)
    {
        $department = EduDepartment::find($id);
       
        return view('departments.edit', compact('department'));
    }

   
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);

        $department = EduDepartment::find($id);
        $department->name = $request->name;
        $department->description = $request->description;
        $department->save();

        Alert::toast('Department Updated successfully', 'success');
        return redirect()->route('department.index');
    }

 
    public function delete($id)
    {
        $department = EduDepartment::find($id);
        $department->delete();
        return true;
    }
}
