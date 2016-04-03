<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public $fillable = [
        'name',
        'isCorrectly'
    ];

    public $timestamps = false;

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
