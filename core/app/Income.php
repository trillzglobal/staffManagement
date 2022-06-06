<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $fillable = [
        'title',
        'file_book_holder',
        'memo_no',
        'client_name',
        'client_type',
        'payment_by',
        'transection_id',
        'date',
        'quantity',
        'price',
        'total_price',
        'received_by'
    ];
}
