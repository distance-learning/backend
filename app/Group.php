<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public $timestamps = false;

    public function students()
    {
        return $this->morphMany(\App\User::class, 'structure');
    }
}
