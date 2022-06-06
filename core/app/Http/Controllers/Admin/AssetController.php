<?php

namespace App\Http\Controllers\Admin;

use App\AssetType;
use App\Equipment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_equipment = Equipment::all();
        $all_asset = AssetType::all();
        return view('admin/Asset/assetList',compact('all_asset','all_equipment'));
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
        //
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
    public function edit(Request $request, $id)
    {
        $edit_data = Equipment::find($id);

        $total = $request->quantity * $request->price;

        $edit_data->equipment_name = $request->equipment_name;
        $edit_data->asset_type = $request->asset_type;
        $edit_data->model = $request->model;
        $edit_data->quantity = $request->quantity;
        $edit_data->price = $request->price;
        $edit_data->total_price = $total;
        $edit_data->update();

        return redirect()->route('admin.assetList')->with(['success'=>'Equipment Updated successfull']);
    }

    public function editShow($id)
    {
        $all_equipment = Equipment::find($id);
        $all_asset = AssetType::get('asset_type');

        return view('admin/Asset/assetListEdit',compact('all_equipment','all_asset'));

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
    public function destroy($id)
    {
        $data = AssetType::find($id);
        $data->delete();
        return response()->json(['success' => 'Asset Deleted Successfully']);


    }

    public function AssetTypeView()
    {

        $all_asset = AssetType::get();


        return view('admin.Asset.assetType',compact('all_asset'));


    }

    public function assetTypeTable()
    {
        $all_asset = AssetType::all();

        return response()->json(['data'=>$all_asset]);


    }

    public function addAssetType(Request $request)
    {
        AssetType::create([
            'asset_type' => $request->asset_type
        ]);

        return response()->json(['success' => 'Asset Type Added']);
      
    }

    public function equipmentView()
    {

         $all_equipment = Equipment::all();

         $all_asset = AssetType::all();

         return view('admin/Asset/equipment',compact('all_asset','all_equipment'));
    }

    public function addEquipment(Request $request)
    {
        
        Equipment::create([
            'equipment_name'=> $request->equipment_name,
            'asset_type'    => $request->asset_type,
            'model'         => $request->model,
            'quantity'      => $request->quantity,
            'price'         => $request->price,
            'total_price'   => $request->quantity * $request->price

        ]);

        return response()->json(['success'=>'Equipment Added successfully']);



    }

    public function editAssetType($id)
    {
        $data = AssetType::find($id);
        return [
            'id'         => $data->id,
            'asset_type' => $data->asset_type
        ];
    }
    public function updateAssetType(Request $request, $id)
    {

        $edit_data = AssetType::find($id);
        $edit_data->asset_type = $request->asset_typeEdit;
        $edit_data->update();
        return response()->json(['success' => 'Updated Asset Type']);
    }


    public function equipmentTable()
    {
        $all_equipment = Equipment::all();
        
        return response()->json(['data'=>$all_equipment]);


    }

    public function deleteEquipment($id)
    {
        $data = Equipment::find($id);
        $data->delete();
        return response()->json('success');


    }

    public function editEquipment($id)
    {
        $data = Equipment::find($id);
        return [
            'id'            => $data->id,
            'equipment_name'=> $data->equipment_name,
            'asset_type'    => $data->asset_type,
            'model'         => $data->model,
            'quantity'      => $data->quantity,
            'price'         => $data->price,
            'total_price'   => $data->total_price
        ];
    }

    public function updateEquipment(Request $request, $id)
    {

        $edit_data = Equipment::find($id);
        $edit_data->equipment_name = $request->equipment_name;
        $edit_data->asset_type = $request->asset_typeEquipmentEdit;
        $edit_data->model = $request->model;
        $edit_data->price = $request->price;
        $edit_data->quantity = $request->quantity;
        $edit_data->total_price = $request->total_price;
        $edit_data->update();
        
        return response()->json('Updated');
    }





}
