<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Project;
use App\Workspace;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $emp = User::where('role', 'employee')->get();

        $workspace = Workspace::findOrFail($id);

        return view('admin.projects.index', compact('workspace', 'emp'));
    }

    public function projecttable($id)
    {

        $project = Project::where('workspace_id', $id)->get();

        return response()->json(['data' => $project]);
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
    public function projectview($wid, $id)
    {
        $workspace = Workspace::findOrFail($wid);

        $projects = Project::with('users')->findOrFail($id);

        $pro = Project::findOrFail($id);
        
        return view('admin.task.index', compact('workspace', 'projects', 'pro'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $project = new Project;
        $project->name = $request->name;
        $project->description = $request->description;
        $project->status = 'ongoing';
        $project->startdate = $request->startdate;
        $project->enddate = $request->enddate;
        $project->budget = $request->budget;
        $project->workspace_id = $request->wid;
        $project->created_by =  Auth::user()->id;
        $project->assign_to = '---';

        $project->save();

        $pid = $project->id;

        $project->users()->attach($request->user_id);

        return response()->json(['success' => 'Project Added successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project, $id)
    {
        $project = Project::find($id);
        return response()->json($project);
    }


    public function update(Request $request, $id)
    {
        
        $project = Project::find($id);

        $project->name = $request->name;
        $project->description = $request->description;
        $project->status = $request->status;
        $project->startdate = $request->startdate;
        $project->enddate = $request->enddate;
        $project->budget = $request->budget;

        $project->save();
        Alert::toast('Project Updated successfully', 'success');

        return true;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }

    public function delete(Request $request, $id)
    {
        $project = Project::find($id);
        $project->users()->detach();

        $project->delete();

        return response()->json($project);
    }
}
