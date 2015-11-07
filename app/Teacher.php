<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public $timestamps = false;

    public function teacher()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function subject()
    {
        return $this->belongsTo(\App\Subject::class);
    }

    public function department()
    {
        return $this->belongsTo(\App\Department::class);
    }
}
