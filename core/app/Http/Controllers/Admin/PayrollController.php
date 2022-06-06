<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Attendance;
use App\User;
use App\EmployeeInfo;
use App\Workspace;
use Illuminate\Support\Facades\Auth;

use App\Payroll;
use Carbon\Carbon;

class PayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    $payroll = Payroll::join('users','users.id','=','payrolls.user_id')->get();

        return view('admin.payroll.index',compact('payroll'));
    }

    public function addpayroll()
    {
        $emp = EmployeeInfo::whereHas('user')->with('user')->get();

        return view('admin.payroll.list',compact('emp'));
    }

    public function payment($id)
    {
        $attendance = Attendance::where('user_id', $id)->latest()->with('user')->get();

        $emp = EmployeeInfo::join('users','users.id','=','employee_infos.user_id')
        ->where('users.id',$id)->get();

        $payroll = Payroll::where('user_id',$id)->get();

        

        return view('admin.payroll.payment',compact('emp','attendance','payroll'));
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
    public function filterbydate(Request $request,$id)
    {

       
        $from = Carbon::parse($request->fromdate)->format('Y-m-d');

        $to = Carbon::parse($request->todate)->format('Y-m-d');

        session()->flash('from', $from);
        session()->flash('to', $to);

        $attendance = Attendance::where('user_id', $id)->whereBetween('date',[$from, $to])->latest()->with('user')->get();

        $emp = EmployeeInfo::join('users','users.id','=','employee_infos.user_id')
        ->where('users.id',$id)->get();

        $payroll = Payroll::where('user_id',$id)->get();

        return view('admin.payroll.payment',compact('emp','attendance','payroll'));
    }

  
    public function store(Request $request,$id)
    {
        $pay = new Payroll;
        $pay->reference = Auth::user()->id;
        $pay->salary = $request->salary;
        $pay->total_salary = $request->total;
        $pay->deduction = $request->deduction;
        $pay->bonus = $request->bonus;
        $pay->fromdate = $request->fromdate;
        $pay->todate = $request->todate;
        $pay->attendance_count = $request->attendance_count;
        $pay->approve_key = $request->approve_key;
        $pay->comment = $request->comment;
        $pay->user_id = $request->user_id;
        $pay->save();

        session()->flash('success','payroll added successfully');
        return redirect()->route('admin.addpayment',$id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    public function show(Payroll $payroll)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    public function edit(Payroll $id)
    {
        return view('admin.payroll.edit',compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $pay = Payroll::find($request->id);

        $pay->total_salary = $request->total;
        $pay->deduction = $request->deduction;
        $pay->bonus = $request->bonus;


        $pay->approve_key = $request->approve_key;
        $pay->comment = $request->comment;

        $pay->save();

        echo "success";

        session()->flash('success','payroll Edited successfully');
        return redirect()->route('admin.addpayment',$request->user_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payroll $payroll,$id,$uid)
    {
        $pay = Payroll::find($id);
        $pay->delete();
        session()->flash('success','payroll Deleted successfully');
        return redirect()->route('admin.addpayment',$uid);
    }
}
