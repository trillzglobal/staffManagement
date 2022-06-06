<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileManagement extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function employee(){
        return $this->belongsTo(EmployeeInfo::class);
    }
}
