<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public $timestamps = false;

    public function teachers()
    {
        return $this->hasMany(\App\Teacher::class);
    }

    public function courses()
    {
        return $this->hasMany(\App\Course::class);
    }
}
