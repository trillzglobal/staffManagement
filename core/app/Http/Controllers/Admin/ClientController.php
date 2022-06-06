<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Client List';
        $data['clientInfo'] = Client::orderBy('id','DESC')->get();
        return view('admin.client.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Add Client';
        return view('admin.client.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'client_name' => 'required',
            'client_email' => 'nullable',
            'client_mobile' => 'nullable',

            'client_company' => 'nullable',
            'client_address' => 'nullable',
            'client_website' => 'nullable',
            'client_meeting_date' => 'required',
            'client_priority' => 'required'
        ]);




        $clientinfo = new Client();

        $clientinfo->client_name = $request->client_name;
        $clientinfo->user_id=Auth::user()->id;
        $clientinfo->client_email = $request->client_email;
        $clientinfo->client_mobile = $request->client_mobile;
        $clientinfo->client_company = $request->client_company;
        $clientinfo->client_address = $request->client_address;
        $clientinfo->client_note = $request->client_note;
        $clientinfo->client_website = $request->client_website;
        $clientinfo->client_meeting_date = $request->client_meeting_date;
        $clientinfo->client_priority = $request->client_priority;

        $clientinfo->save();




        Alert::toast('Client Added successfully', 'success');
        return redirect()->route('client.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title'] = 'Edit Client';
        $data['client'] = Client::findOrFail($id);
        return view('admin.client.edit',$data);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $clientinfo = Client::findOrFail($id);
        $clientinfo->client_name = $request->client_name;

        $clientinfo->client_email = $request->client_email;
        $clientinfo->client_mobile = $request->client_mobile;
        $clientinfo->client_company = $request->client_company;
        $clientinfo->client_address = $request->client_address;
        $clientinfo->client_note = $request->client_note;
        $clientinfo->client_website = $request->client_website;
        $clientinfo->client_meeting_date = $request->client_meeting_date;
        $clientinfo->client_priority = $request->client_priority;

        $clientinfo->save();




        Alert::toast('Client Updated successfully', 'info');
        return redirect()->route('client.index');




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $clientinfo = Client::findOrFail($id);
         $clientinfo->delete();
         Alert::toast('Client Deleted successfully', 'success');
         return redirect()->route('client.index');

    }
}
