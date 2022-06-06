<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Attendance;
use App\Shift;
use App\User;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

class AttendanceController extends Controller
{
    function index()
    {
        $attendance = Attendance::join('users', 'users.id', '=', 'attendances.user_id')
            ->orderBy('attendances.id', 'DESC')
            ->get();
        return view('admin.attendance.index', compact('attendance'));
    }

    function attendanceform()
    {
        return view('admin.attendance.attendanceform');
    }

    public function store(Request $req)
    {
        $shift = Shift::first();

        $time = now()->toDateString();

        $atten = Attendance::where('user_id', $req->userid)
            ->where('date', $time)
            ->first();

        $checkUser = User::where('id', $req->userid)->first();

        if (!$checkUser) {
            session()->flash('failed', 'No Employee Found With This Id');

            return back();
        }


        if ($checkUser->emp_info->shift == null) {

            session()->flash('failed', 'Please set Shift for this user');

            return back();
        }

        switch ($req->input('action')) {
            case 'timein':

                if (!$checkUser->emp_info) {

                    session()->flash('failed', 'No Employee Profile Found');

                    return back();
                }
                if ($checkUser->emp_info->shift == 'day') {


                    $start = strtotime(now()->format('H:i'));
                    $entryTime = strtotime(Carbon::parse($shift->from_day)->format('H:i'));
                    $uptime = strtotime(Carbon::parse($shift->from_day)->addMinutes(15)->format('H:i'));
                    $timerange = range($entryTime, $uptime);



                    if (in_array($start, $timerange)) {
                        $status = 'okay';
                    } else {
                        $status = 'late in';
                    }
                }
                if ($checkUser->emp_info->shift == 'night') {

                    $start = strtotime(now()->format('H:i'));
                    $entryTime = strtotime(Carbon::parse($shift->from_night)->format('H:i'));
                    $uptime = strtotime(Carbon::parse($shift->from_night)->addMinutes(15)->format('H:i'));
                    $timerange = range($entryTime, $uptime);



                    if (in_array($start, $timerange)) {
                        $status = 'okay';
                    } else {
                        $status = 'late in';
                    }
                }

                if ($atten) {
                    session()->flash('failed', 'This User already Time in Today');
                    return redirect()->route('admin.attendanceform');
                } else {
                    $attendance = new Attendance;
                    $attendance->date = $time;
                    $attendance->timein = Carbon::now();
                    $attendance->timeout = '0';
                    $attendance->workedhours = '0';
                    $attendance->timein_status = $status;
                    $attendance->timein_ip = $req->ip();
                    $attendance->user_id = $req->userid;
                    $attendance->save();
                    session()->flash('success', 'Successfully Timed In');
                    return redirect()->route('admin.attendanceform');
                }



                break;

            case 'timeout':


                if ($atten) {

                    $att = Attendance::where('user_id', $req->userid)
                        ->where('date', $time)
                        ->where('workedhours', '0')
                        ->get();
                    if (count($att) > 0) {


                        // Time In
                        $startTime = Carbon::parse($atten->timein);

                        // timeOut
                        $endTime = Carbon::now();

                        $totalDuration =  $startTime->diffInSeconds($endTime);


                        $totalDuration = gmdate('h:i', $totalDuration);


                        $end = strtotime($endTime->format('H:i'));


                        $start = Carbon::parse($endTime)->format('H:i');


                        if ($checkUser->emp_info->shift == 'night') {


                            $exitTime = strtotime(Carbon::parse($shift->to_night)->format('H:i'));
                            $uptime = strtotime(Carbon::parse($shift->to_night)->subMinutes(15)->format('H:i'));
                            $timerange = range($exitTime, $uptime);

                            if (in_array($end, $timerange)) {
                                $status = 'okay';
                            } else {
                                $status = 'early out';
                            }
                        }


                        if ($checkUser->emp_info->shift == 'day') {

                            $exitTime = strtotime(Carbon::parse($shift->to_day)->format('H:i'));

                            $uptime = strtotime(Carbon::parse($shift->to_day)->subMinutes(15)->format('H:i'));

                            $timerange = range($exitTime, $uptime);


                            if (in_array($end, $timerange)) {

                                $status = 'okay';
                            } else {

                                $status = 'early out';
                            }
                        }



                        $attendance = Attendance::find($atten->id);
                        $attendance->timeout = Carbon::now();
                        $attendance->workedhours = $totalDuration;
                        $attendance->timeout_status = $status;
                        $attendance->timeout_ip = $req->ip();
                        $attendance->save();
                        session()->flash('success', 'Successfully Time Out');
                        return redirect()->route('admin.attendanceform');
                    } else {
                        session()->flash('failed', 'User Already Timed Out');
                        return redirect()->route('admin.attendanceform');
                    }
                } else {

                    session()->flash('failed', 'User not time in today');
                    return redirect()->route('admin.attendanceform');
                }

                break;
        }
    }
}
