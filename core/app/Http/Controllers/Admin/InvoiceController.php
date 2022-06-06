<?php

namespace App\Http\Controllers\Admin;

use App\Invoice;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class InvoiceController extends Controller
{
  
    public function index()
    {
        $invoice = Invoice::latest()->get();

        return view('admin.invoice.invoice_add', compact('invoice'));
    }

   
    public function create()
    {
        
    }

    public function store(Request $request)
    {

        $item = [];
        foreach ($request->addmore as  $value) {
            array_push($item, [
                'item' => $value['item'],
                'price' =>  $value['price']
            ]);
        }
        $data = json_encode($item);

        $insert = Invoice::insert([
            "list_price" => $data,
            "date" => $request->date,
            "invoiceto" => $request->invoiceto,
            'contact' => $request->contact,
            'payment_status' => $request->status,
            'due' => $request->due,
            'partial' => $request->partial,
            'total' => $request->total
        ]);


        Alert::toast('Invoice Added successfully', 'success');
        return true;
    }

   
    public function show($id)
    {
        $invoice_details = Invoice::find($id);

        return view('admin.invoice.invoice', compact('invoice_details'));
    }



    public function email($id)
    {
        $data = Invoice::find($id);
        sendGeneralMail($data);
        Alert::success('Success', 'Email Send Successfully');
        return redirect()->back();
    }

    public function download($id)
    {
        $invoice_details = Invoice::findOrFail($id);
        $pdf = PDF::loadView('admin.mail.invoice', compact('invoice_details'));
        return $pdf->download('invoice.pdf');
    }

    public function edit($id)
    {
        $data = Invoice::find($id);
        $data_list = json_decode($data->list_price);
        $count = count($data_list);
        return [
            'data'  => $data,
            'data_list'  => $data_list,
            'count'   => $count,
        ];
    }


    public function update(Request $request, $id)
    {
        $item = [];
        foreach ($request->addmore as  $value) {
            array_push($item, [
                'item' => $value['item'],
                'price' =>  $value['price']
            ]);
        }

        $data = json_encode($item);

        $update_data = Invoice::find($id);
        $update_data->invoiceto = $request->invoiceto;
        $update_data->date = $request->date;
        $update_data->contact = $request->contact;
        $update_data->due = $request->due;
        $update_data->partial = $request->partial;
        $update_data->payment_status = $request->status;
        $update_data->total = $request->total;
        $update_data->list_price = $data;
        $update_data->update();
        Alert::toast('Invoice Updated successfully', 'info');
        return true;
    }

    public function destroy($id)
    {
        $data = Invoice::find($id);
        $data->delete();
        return true;
    }
}
