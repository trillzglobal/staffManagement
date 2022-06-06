<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IncomRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'file_book_holder' => 'required',
            'title' => 'required',
            'client_name' => 'required',
            'client_type' => 'required',
            'payment_by' => 'required',
            'received_by' => 'required',
            'memo_no' => 'required',
            'transection_id' => 'required',
            'date' => 'required|date',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric|gt:0',
            'total_price' => 'required|numeric|gt:0',

        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
           
        ];
    }
}
