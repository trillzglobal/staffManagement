<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Workspace;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class WorkspaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.workspace.index');
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $workspace = new Workspace;
        $workspace->name = $request->name;
        $workspace->slug = $request->name;
        $workspace->created_by = Auth::user()->id;
        $workspace->save();
   
        return response()->json(['success' => 'Workspace Created Successfully']);



    }

    public function workspacetable()
    {

        $workspace = Workspace::all();

        return response()->json(['data'=>$workspace]);


    }
    public function delete($id){
        $workspace = Workspace::find($id);
        $workspace->delete();
        return response()->json($workspace);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Workspace  $workspace
     * @return \Illuminate\Http\Response
     */
    public function show(Workspace $workspace)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Workspace  $workspace
     * @return \Illuminate\Http\Response
     */
    public function edit(Workspace $workspace,$id)
    {
        $workspace = Workspace::find($id);
        return response()->json($workspace);

    }

    
    public function update(Request $request, Workspace $workspace,$id)
    {
        $workspace = Workspace::find($id);
        $workspace->name = $request->name;
        $workspace->slug = $request->name;
        $workspace->save();
        return response()->json(['success' => 'Updated Successfull']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Workspace  $workspace
     * @return \Illuminate\Http\Response
     */
    public function destroy(Workspace $workspace)
    {
        //
    }
}
