<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    public $fillable = [
        'name',
        'time',
        'teacher_id'
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
