<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Language;
use Illuminate\Http\Request;
use Vonage\Message\Shortcode\Alert;

class LanguageController extends Controller
{
    public function index()
    {
        $pageTitle = "Language Settings";
        $languages = Language::latest()->get();
        return view('admin.language.index', compact('languages' , 'pageTitle'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'language' => 'required|unique:languages,name',
            'short_code' => 'required|unique:languages,short_code',
        ]);

        $laguage = Language::first();

        if($laguage){
            $is_default = 0;
        }else{
            $is_default = 1;
        }

        Language::create([
            'name'=> $request->language,
            'short_code' => $request->short_code,
            'is_default' => $is_default
        ]);


        $path = resource_path('lang/');

        fopen($path."$request->short_code.json", "w");

        file_put_contents($path."$request->short_code.json",'{}');


        $notify[] = ['success','Language Created Successfully'];

        return back()->withNotify($notify);
    }

    public function update(Request $request)
    {
        $laguage = Language::findOrFail($request->id);

        $request->validate([
            'language' => 'required|unique:languages,name,'.$laguage->id,
            'short_code' => 'required|unique:languages,short_code,'.$laguage->id,
        ]);

        $laguage->update([
            'name'=> $request->language,
            'short_code' => $request->short_code
        ]);

        $path = resource_path()."/lang/$laguage->short_code.json";


        if(file_exists($path)){

            $file_data = json_encode(file_get_contents($path));

            unlink($path);

            file_put_contents($path,json_decode($file_data));
        }else{

            fopen(resource_path()."/lang/$request->short_code.json", "w");

            file_put_contents(resource_path()."/lang/$request->short_code.json", '{}');
        }



        $notify[] = ['success','Language Updated Successfully'];

        return back()->withNotify($notify);



    }

    public function delete(Request $request)
    {
        $laguage = Language::findOrFail($request->id);

        if($laguage->is_default){
            $notify[] = ['error','Default Language Can not Deleted'];
            return back()->withNotify($notify);
        }

        $path = resource_path()."/lang/$laguage->short_code.json";

        if(file_exists($path)){
            @unlink($path);
        }

        $laguage->delete();


        $notify[] = ['success','Language Deleted Successfully'];

        return back()->withNotify($notify);
    }


    public function transalate(Request $request)
    {
       $pageTitle = "Language Translator";
       
       $languages = Language::where('short_code','!=',$request->lang)->get();

       $language = Language::where('short_code', $request->lang)->firstOrFail();

       $translators = json_decode(file_get_contents(resource_path()."/lang/$language->short_code.json"),true);



       return view('admin.language.translate',compact('translators','languages'));
    }




    public function transalateUpate(Request $request)
    {
        $language = Language::where('short_code', $request->lang)->firstOrFail();

        $translator = array_filter(array_combine($request->key,$request->value));

        file_put_contents(resource_path()."/lang/$language->short_code.json",json_encode($translator));

        return back();
    }

    public function import(Request $request)
    {
        $language = Language::where('short_code', $request->import)->firstOrFail();


        $currentLang = Language::where('short_code', $request->current)->firstOrFail();


        $contents = file_get_contents(resource_path()."/lang/$language->short_code.json");

        file_put_contents(resource_path()."/lang/$currentLang->short_code.json",$contents);


    }
}
