<?php

namespace App\Http\Controllers\Expensive;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Expensive;
use App\Category;

class ExpensiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expensives = Expensive::get();
        return view('admin.Expensive.expensive_add', compact('expensives'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        $expensives = Expensive::get();
        return view('admin.Expensive.expensive_add', compact('categories', 'expensives'));
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

            'expense_date' => 'required|date',
            'total_expense' => 'required',
        ]);

        

      Expensive::create([
            "category_id" => $request->category_id,
            "expense_date" => $request->expense_date,
            "comment" => $request->comment,
            'items' => $request->addmore,
            'total_expense' => $request->total_expense,
        ]);

        return response()->json(['success'=> 'success']);

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
    public function destroy(Request $request, $id)
    {
        $delete = Expensive::where("id", $id)->first();
        $delete->delete();
    }
}
