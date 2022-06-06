<?php

namespace App\Http\Controllers\Income;

use App\Income;
use Illuminate\Http\Request;
use App\Http\Requests\IncomRequest;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incomes = Income::latest()->get();
       
        return view('admin.Income.add_income', compact('incomes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Income.add_income');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IncomRequest $request)
    {

        $insert = new Income();

        $insert->title = $request->title;
        $insert->file_book_holder = $request->file_book_holder;
        $insert->memo_no = $request->memo_no;
        $insert->client_name = $request->client_name;
        $insert->client_type = $request->client_type;
        $insert->payment_by = $request->payment_by;
        $insert->transection_id = $request->transection_id;
        $insert->date = $request->date;
        $insert->quantity = $request->quantity;
        $insert->price = $request->price;
        $insert->total_price = $request->total_price;
        $insert->received_by = $request->received_by;
        $insert->save();

        Alert::toast('Income Added successfully', 'success');


       
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

    public function viewdata(Request $request)
    {

        $incomeView = Income::find($request->id);
        return $incomeView;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $delete = Income::where("id", $request->id)->delete();
        if($delete){
                return response()->json("success");
        }else{
                /*return response()->json("error");*/
                return redirect()->back();
        }
    }
}
