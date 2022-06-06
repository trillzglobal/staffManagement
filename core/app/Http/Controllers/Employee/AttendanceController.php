<?php

namespace App\Http\Controllers\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Attendance;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    function index(){

        $attendance = Attendance::where('user_id',Auth::user()->id)->get();
        return view('employee.attendance.index',compact('attendance'));
    }

    function attendanceform(Request $req){

        $a = $req->ip();

        return view('employee.attendance.attendanceform',compact('a'));
    }

    function store(Request $req){

        


        $time = Carbon::today()->toDateString();
        $atten = Attendance::where('user_id',Auth::user()->id)
        ->where('date',$time)
        ->get();

        
      
        $startTime = Carbon::now();
        $start = Carbon::parse($startTime)->format('H.i');

       
       if ($start>09.15) {
     $status = 'late in';
    } else {
     $status = 'okay';
    }

        if(count($atten)>0){
            session()->flash('failed','You already Time in Today');
            return redirect()->route('employee.attendanceform');
        }
        else{
        $attendance=New Attendance;
        $attendance->date=$time;
        $attendance->timein=Carbon::now();
        $attendance->timeout='0';
        $attendance->workedhours='0';
        $attendance->timein_status=$status;
        $attendance->timein_ip=$req->ip();
        $attendance->user_id=Auth::user()->id;
        $attendance->save();
        session()->flash('success','Successfully Timed In');
        return redirect()->route('employee.attendanceform');
    }
    }


    function update(Request $req){

       
        





        $time = Carbon::today()->toDateString();
        $atten = Attendance::where('user_id',Auth::user()->id)
        ->where('date',$time)
        ->get();


        

        if(count($atten)>0){

            $att = Attendance::where('user_id',Auth::user()->id)
            ->where('date',$time)
            ->where('workedhours','0')
            ->get();
            if (count($att)>0) {

                
        $startTime = Carbon::parse($atten[0]->timein);

        $endTime = Carbon::now();
       
        $totalDuration =  $startTime->diff($endTime)->format('%H.%I');
        //dd($endTime);
       // echo $totalDuration;
       
       $end = Carbon::parse($endTime)->format('H.i');
       $start = Carbon::parse($endTime)->format('H.i');

       
       if ($end<17.45) {
     $status = 'early out';
    } else {
     $status = 'okay';
    }
       
       
               
            $attendance=Attendance::find($atten[0]->id);
            $attendance->timeout=Carbon::now();
            $attendance->workedhours=$totalDuration;
            $attendance->timeout_status=$status;
            $attendance->timeout_ip=$req->ip();
            $attendance->save();
            session()->flash('success','Successfully Time Out');
            return redirect()->route('employee.attendanceform');
            } else {
            session()->flash('failed','Already Timed Out');
            return redirect()->route('employee.attendanceform');
            }







            
        }
        else{

            session()->flash('failed','You are not timed in today');
            return redirect()->route('employee.attendanceform');
       
    }
    
    }
}
