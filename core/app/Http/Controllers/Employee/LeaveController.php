<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LeaveType;
use App\Leave;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leave_Types = Leavetype::all();
        return view('employee/leave',compact('leave_Types',$leave_Types));
    }

    public function LeaveRequestTable(Request $request, $id)
    {
       
        $all_leaveRequest = Leave::where('idno',$id)->get();
       
        return response()->json(['data'=>$all_leaveRequest]);   
    }
    
    public function addLeaveRequest(Request $request)
    {
        
        Leave::create([
            'idno' => $request->employee_id,
            'employee' => $request->employee_name,
            'type' => $request->leave_typeRequest,
            'leavefrom' => $request->leave_from,
            'leaveto' => $request->leave_to,
            'reason' => $request->reason,
            'status' => 'pending',
            'comment' => $request->reasonedit,
            'archived' => 0

            

        ]);

        return response()->json('success');
        
        
    }

    
    public function editLeaveRequest($id)
    {
        $data = Leave::find($id);
        return [
            'idno' => $data->idno,
            'employee' => $data->employee,
            'type' => $data->type,
            'leavefrom' => $data->leavefrom,
            'leaveto' => $data->leaveto,
            'reason' => $data->reason, 
        ];
    }
    public function updateLeaverequest(Request $request, $id)
    {
        $edit_data = Leave::find($id);
        $edit_data->type = $request->leave_typeRequest;
        $edit_data->leavefrom = $request->leave_from;
        $edit_data->leaveto = $request->leave_to;
        $edit_data->reason = $request->reason;
        $edit_data->update();
        return response()->json('Updated');
    }
    
    public function deleteLeaveRequest($id)
    {
        $data = Leave::find($id);
        $data->delete();
        return response()->json('success');

    }
    
    

}