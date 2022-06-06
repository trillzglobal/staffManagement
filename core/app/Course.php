<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function enrolls()
    {
        return $this->hasMany(Enroll::class);
    }

    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }

    public function department()
    {
        return $this->belongsTo(EduDepartment::class);
    }
}
