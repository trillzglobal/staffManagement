<?php


namespace App\Http\Controllers\Admin;

use DB;
use File;
use Image;
use App\Logo;
use App\Task;
use App\User;
use App\Income;
use App\Project;
use App\AssetType;
use App\Copyright;

use App\Expensive;
use App\Signature;
use Carbon\Carbon;
use App\Attendance;
use Illuminate\Http\Request;
use App\Notifications\TaskAssign;
use App\Http\Controllers\Controller;
use App\Shift;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    function index()
    {
        $totalemp = User::where('role', 'employee')->orwhere('role', 'admin')->where('status', 1)->get();

        $totalpro = Project::where('status', 'ongoing')->get();


        $activeuser = Attendance::join('users', 'users.id', '=', 'attendances.user_id')
            ->where('attendances.timeout', '0')->where('attendances.date', date('Y-m-d'))->get();
        $asset = AssetType::get();

        $tpro = Project::get();
        $ttask = Task::get();


        $check = count($totalemp) - count($activeuser);

        $totalex = Expensive::sum('total_expense');
        $totalin = Income::sum('total_price');

        $totalprofit = $totalin - $totalex;

        $users = Income::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"), date('Y'))
            ->get();


        return view('admin.dashboard', compact('activeuser', 'check', 'totalex', 'totalin', 'ttask', 'totalpro', 'tpro', 'totalemp', 'users', 'totalprofit', 'asset'));
    }

    public function logo()
    {
        $logo = Logo::first();
        return view('admin.logo.index', compact('logo'));
    }

    public function signature()
    {
        return view('admin.signature.index');
    }

    public function logostore(Request $req)
    {
        $logo = Logo::first();

        if ($logo) {

            $img = $logo->logo;
        } else {
            $img = '';
        }

        if ($req->hasFile('image')) {

            $image = $req->file('image');
            $img = 'logo' . '.' . $image->getClientOriginalExtension();
            $location = 'assets/images/logo/' . $img;

            @unlink('assets/images/logo/' . $logo->logo);
            Image::make($image)->save($location);
        }

        Logo::updateOrCreate(['id' => 1], [
            'logo' => $img
        ]);

        session()->flash('success', 'Logo Updated');
        return redirect()->route('logo');
    }

    public function signaturestore(Request $req)
    {


        $signature = new Signature;

        $image = $req->file('image');
        $img = 'signature' . '.' . $image->getClientOriginalExtension();
        $location = 'assets/images/signature/' . $img;
        Image::make($image)->save($location);

        Signature::updateOrCreate(['id' => 1],['signature' => $img]);
       


        session()->flash('success', 'Signature Updated');
        return redirect()->route('signature.create');
    }

    public function copyright()
    {

        $copy = Copyright::first();

        return view('admin.copyright.index', compact('copy'));
    }


    public function copyrightstore(Request $req)
    {
        Copyright::updateOrCreate(['id' => 1],[
            'name' => $req->name
        ]);

        session()->flash('success', 'Copyright Changed');
        return redirect()->route('copyright');
    }


    function storeattendance(Request $req)
    {

        $shift = Shift::first();

        if (!$shift) {

            Alert::error('Set Shift First');

            return redirect()->route('shift');
        }

        $time = Carbon::today()->toDateString();

        $atten = Attendance::where('user_id', Auth::user()->id)
            ->where('date', $time)
            ->get();



        if (auth()->user()->emp_info->shift == null) {


            session()->flash('failed', 'Please set Shift');

            return back();
        }



        $startTime = Carbon::now();

        $start = Carbon::parse($startTime)->format('H.i');

        if (auth()->user()->emp_info->shift == 'day') {


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
        if (auth()->user()->emp_info->shift == 'night') {

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

        if (!$atten->isEmpty()) {

            session()->flash('failed', 'This User already Time in Today');
            return redirect()->route('admin.dashboard');
        } else {
            $attendance = new Attendance;
            $attendance->date = $time;
            $attendance->timein = Carbon::now();
            $attendance->timeout = '0';
            $attendance->workedhours = '0';
            $attendance->timein_status = $status;
            $attendance->timein_ip = $req->ip();
            $attendance->user_id = auth()->id();
            $attendance->save();
            session()->flash('success', 'Successfully Timed In');
            return redirect()->route('admin.dashboard');
        }
    }


    function updateattendance(Request $req)
    {

        $shift = Shift::first();

        $time = Carbon::today()->toDateString();

        $atten = Attendance::where('user_id', Auth::user()->id)
            ->where('date', $time)
            ->first();


        if ($atten) {

            $att = Attendance::where('user_id', auth()->id())
                ->where('date', $time)
                ->where('workedhours', '0')
                ->get();
            if (count($att) > 0) {



                // Time In
                $startTime = Carbon::parse($atten->timein);

                // timeOut
                $endTime = Carbon::now();

                $totalDuration =  $startTime->diffInSeconds($endTime);

                $totalDuration = gmdate('H:i:s', $totalDuration);


                $end = strtotime($endTime->format('H:i'));


                $start = Carbon::parse($endTime)->format('H:i');


                if (auth()->user()->emp_info->shift == 'night') {


                    $exitTime = strtotime(Carbon::parse($shift->to_night)->format('H:i'));
                    $uptime = strtotime(Carbon::parse($shift->to_night)->subMinutes(15)->format('H:i'));
                    $timerange = range($exitTime, $uptime);

                    if (in_array($end, $timerange)) {
                        $status = 'okay';
                    } else {
                        $status = 'early out';
                    }
                }


                if (auth()->user()->emp_info->shift == 'day') {

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
                return redirect()->route('admin.dashboard');
            } else {
                session()->flash('failed', 'User Already Timed Out');
                return redirect()->route('admin.dashboard');
            }
        } else {

            session()->flash('failed', 'User not time in today');
            return redirect()->route('admin.dashboard');
        }
    }

    // time View Load
    public function timeview()
    {
        return view('admin.timezone.index');
    }

    // TimeZone Preset

    public function timezone(Request $request)
    {
        $timezoneFile = config_path('timezone.php');
        $content = '<?php $timezone = ' . $request->timezone . ' ?>';
        file_put_contents($timezoneFile, $content);

        session()->flash('success', 'Time Zone Updated Successfully');
        return redirect()->route('admin.time.index');
    }

    public function shift()
    {
        $shifts = Shift::first();
        return view('admin.shift_setting', compact('shifts', $shifts));
    }

    public function shiftStore(Request $request)
    {


        $request->validate([
            'from_day' => 'nullable',
            'to_day' => 'nullable',
            'from_night' => 'nullable',
            'to_night' => 'nullable',
        ]);

        $from_day = Carbon::parse($request->from_day)->format('H:i');
        $to_day = Carbon::parse($request->to_day)->format('H:i');
        $from_night = Carbon::parse($request->from_night)->format('H:i');
        $to_night = Carbon::parse($request->to_night)->format('H:i');

        Shift::updateOrCreate([
            'id' => 1
        ], [
            'from_day' => $from_day,
            'to_day' => $to_day,
            'from_night' => $from_night,
            'to_night' => $to_night
        ]);


        session()->flash('success', 'Saved Shift');
        return back();
    }

    public function changeLang(Request $request)
    {
        App::setLocale($request->lang);

        session()->put('locale', $request->lang);

        return redirect()->back();
    }


    public function sitename()
    {
        $sitename = Logo::first();

        return view('admin.logo.setting', compact('sitename'));
    }

    public function sitenameUpdate(Request $request)
    {
        $request->validate([
            'sitename' => 'required'
        ]);

        $sitename = Logo::first();

        if ($sitename) {
            $sitename->sitename = $request->sitename;
        } else {
            $sitename = new Logo();
            $sitename->sitename = $request->sitename;
        }


        $sitename->save();

        Alert::toast('Site Name Updated successfully', 'success');

        return back();
    }

    public function emailConfig()
    {
        $pageTitle = 'Email Configuration';

        return view('admin.mail.config', compact('pageTitle'));
    }

    public function emailConfigUpdate(Request $request)
    {

        $data = $request->validate([
            'site_email' => 'required|email',
            'email_method' => 'required',
            'email_config' => "required_if:email_method,==,smtp",
            'email_config.*' => 'required_if:email_method,==,smtp'
        ]);

        $general = Logo::first();

        Logo::updateOrCreate(['id' => 1], $data);

        $this->updateDotEnv($data);


        $notify[] = ['success', "Email Setting Updated Successfully"];

        return redirect()->back()->withNotify($notify);
    }

    protected function updateDotEnv($data)
    {
        $email = config_path('mail_config.php');

        $content = '';

        $content .= '<?php $email_method = ' . '"' . $data["email_method"] . '"' . ' ;';
        $content .= '$host = ' . '"' . $data["email_config"]["smtp_host"]  . '"' . ' ;';
        $content .= '$username = ' . '"' . $data["email_config"]["smtp_username"] . '"' . ' ;';
        $content .= '$password = ' . '"' . $data["email_config"]["smtp_password"] . '"' . ' ;';
        $content .= '$port = ' . '"' . $data["email_config"]["smtp_port"] . '"' . ' ;';
        $content .= '$encryption = ' . '"' . $data["email_config"]["smtp_encryption"] . '"' . '; ?>';

        file_put_contents($email, $content);
    }


    public function our_backup_database()
    {
        $mysqlHostName      = env('DB_HOST');
        $mysqlUserName      = env('DB_USERNAME');
        $mysqlPassword      = env('DB_PASSWORD');
        $DbName             = env('DB_DATABASE');

        $connect = new \PDO("mysql:host=$mysqlHostName;dbname=$DbName;charset=utf8", "$mysqlUserName", "$mysqlPassword", array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        $get_all_table_query = "SHOW TABLES";
        $statement = $connect->prepare($get_all_table_query);
        $statement->execute();
        $result = $statement->fetchAll();

        $output = '';
        foreach ($result as $table) {

            $show_table_query = "SHOW CREATE TABLE " . $table[0] . "";
            $statement = $connect->prepare($show_table_query);
            $statement->execute();
            $show_table_result = $statement->fetchAll();

            foreach ($show_table_result as $show_table_row) {
                $output .= "\n\n" . $show_table_row["Create Table"] . ";\n\n";
            }
            $select_query = "SELECT * FROM " . $table[0] . "";
            $statement = $connect->prepare($select_query);
            $statement->execute();
            $total_row = $statement->rowCount();

            for ($count = 0; $count < $total_row; $count++) {
                $single_result = $statement->fetch(\PDO::FETCH_ASSOC);
               
                $table_column_array = array_keys($single_result);
                $table_value_array = array_values($single_result);
                $output .= "\nINSERT INTO $table[0] (";
                $output .= "" . implode(", ", $table_column_array) . ") VALUES (";
                $output .= "'" . implode("','", $table_value_array) . "');\n";
            }
        }
        $file_name = 'database_backup_on_' . date('y-m-d') . '.sql';
        $file_handle = fopen($file_name, 'w+');
        fwrite($file_handle, $output);
        fclose($file_handle);
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($file_name));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file_name));
        ob_clean();
        flush();
        readfile($file_name);
        unlink($file_name);
    }
}
