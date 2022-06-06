<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class EmployeeInfo extends Model
{
    protected $guarded = [];

    protected $casts = [
        'cv' => 'array',
        'certificate' => 'array',
        'nid_photo' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
