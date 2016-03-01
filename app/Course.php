<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public $fillable = [
        'subject_id',
        'teacher_id',
        'group_id',
        'slug',
    ];

    public $timestamps = false;

    public function group()
    {
        return $this->belongsTo(\App\Group::class);
    }

    public function subject()
    {
        return $this->belongsTo(\App\Subject::class);
    }

    public function teacher()
    {
        return $this->belongsTo(\App\Teacher::class);
    }
}
