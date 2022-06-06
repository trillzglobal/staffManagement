<?php

namespace App;
//use User;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name'];


    public function users(){
        return $this->belongsToMany(User::class,'project_user','project_id','user_id');
    }
}
