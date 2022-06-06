<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $fillable = ['equipment_name','asset_type','model','quantity','price','total_price'];
}