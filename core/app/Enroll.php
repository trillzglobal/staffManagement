<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enroll extends Model
{
    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
