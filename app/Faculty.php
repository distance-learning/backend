<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    public $timestamps = false;

    public $fillable = [
        'name',
        'description',
        'avatar'
    ];

    public static $rules = [
        'name' => 'required',
        'description' => 'required'
    ];

    public function faculty_administrator()
    {
        return $this->morphTo(\App\User::class, 'structure');
    }

    public function departments()
    {
        return $this->hasMany(\App\Department::class);
    }
}
