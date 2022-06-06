<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $categories = Category::get();
        return view('admin.Category.category_add', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Category.category_add');
    }

  
    public function store(Request $request)
    {
       $request->validate(['expense_category_name' => 'required|unique:categories,expense_category_name']);
       
        $insert = new Category();

        $insert->expense_category_name = $request->expense_category_name;
        $insert->save();

        Alert::toast('Category Added successfully', 'success');
    }

    public function update (Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate(['expense_category_name' => 'required|unique:categories,expense_category_name,'.$category->id]);
       

        $category->expense_category_name = $request->expense_category_name;
        $category->save();

        Alert::toast('Updated Successfull', 'success');

        return redirect()->back()->with('success', 'Updated Successfull');
    }

    public function destroy(Request $request, $id)
    {
        $delete = Category::where("id", $id)->first();
        $delete -> delete();

        Alert::toast('Income Deleted successfully', 'success');
    }
}
