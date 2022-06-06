<?php

namespace App\Http\Controllers\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Task;
use App\User;
use Carbon\Carbon;

class TaskController extends Controller
{
    public function index(){

        $inProgress = Task::join('task_user','task_user.task_id','=','tasks.id')
        ->where('task_user.user_id',Auth::user()->id)
        ->where('tasks.status','inprogress')->get(); 

        $todo = Task::join('task_user','task_user.task_id','=','tasks.id')
        ->where('task_user.user_id',Auth::user()->id)
        ->where('tasks.status','todo')->get();

        $finished = Task::join('task_user','task_user.task_id','=','tasks.id')
        ->where('task_user.user_id',Auth::user()->id)
        ->where('tasks.status','finished')->get();
  
        return view('employee.task.index',compact('inProgress','todo','finished'));
    }
}
