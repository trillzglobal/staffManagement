<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Expensive extends Model
{
    protected $guarded= [];

    protected $casts = ['items' => 'object'];
    public function category(){

         return $this->belongsTo(Category::class, 'category_id', 'id');

     }
}
