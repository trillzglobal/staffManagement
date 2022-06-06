<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workspace extends Model
{
    protected $fillable = [
        'name', 'slug','created_by'
    ];
}
