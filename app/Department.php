<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public $timestamps = false;

    public function teacher()
    {
        return $this->morphMany(\App\User::class, 'structure');
    }

    public function faculty()
    {
        return $this->belongsTo(\App\User::class);
    }
}
