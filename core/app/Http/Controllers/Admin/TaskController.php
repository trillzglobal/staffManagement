<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Project;
use App\User;
use App\Task;
use App\Workspace;
use Illuminate\Support\Facades\Auth;
use App\Notifications\TaskAssign;
use Illuminate\Support\Facades\Notification;

class TaskController extends Controller
{
  
    public function create()
    {
        //
    }

    public function inprogress(Request $request)
    {
        $data = Task::where('project_id', $request->id)->where('status','inprogress')->get();
        return response()->json($data);
    }

    public function todo(Request $request)
    {
        $data = Task::where('project_id', $request->id)->where('status','todo')->get();
        return response()->json($data);
    }

    public function finished(Request $request)
    {
        $data = Task::where('project_id', $request->id)->where('status','finished')->get();
        return response()->json($data);
    }
   
    public function store(Request $request)
    {

        $request -> validate([
            'name' => 'required',
            'priority' => 'required',
            'description' => 'required',
            'startdate' => 'required',
            'enddate' => 'required',
            'status' => 'required',
        ]);


        $a = User::select('name')->find($request->user_id);

        $task = new Task;
        $task->name = $request->name;
        $task->description = $request->description;
        $task->status = $request->status;
        $task->startdate = $request->startdate;
        $task->enddate = $request->enddate;
        $task->priority = $request->priority;
        $task->project_name = $request->project_name;
        $task->project_id = $request->project_id;
        $task->assign_to = $a;
        $task->workspace_id = $request->workspace_id;


        $task->save();
        $task->users()->attach($request->user_id);

        $user = User::find($request->user_id);

        Notification::send($user, new TaskAssign($user));

    }


    public function delete($id)
    {
        $task = Task::find($id);
        $task->users()->detach();
        $task->delete();
        return response()->json($task);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task,$id)
    {
        $task = Task::join('task_user','task_user.task_id','=','tasks.id')
        ->where('task_user.task_id',$id)->get();
        return response()->json($task);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $task = Task::find($id);
        $task->name = $request->name;
        $task->description = $request->description;
         $task->status = $request->status;
        $task->startdate = $request->startdate;
        $task->enddate = $request->enddate;
        $task->priority = $request->priority;
        // $task->project_name = $request->project_name;
        // $task->assign_to = $a;
        // $task->workspace_id = $request->workspace_id;


        $task->save();
        //$task->users()->sync($request->user_id);

        return response()->json($task);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }
}
