<?php

namespace App;

use App\EmployeeInfo;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role','status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function roles(){
        return $this->belongsTo(Role::class,'role_users');
    }


    public function tasks(){
        return $this->belongsToMany(Task::class,'task_user');
    }

    public function emp_info()
    {
        return $this->belongsTo(EmployeeInfo::class, 'id' , 'user_id')->withDefault();
    }

    public function projects(){
        return $this->belongsToMany(Project::class,'project_user');
    }



}
