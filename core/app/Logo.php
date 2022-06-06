<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    protected $casts = [
        'email_config' => 'object'
    ];
    protected $guarded =[];
}
