<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public $fillable = [
        'body',
        'iscorrectly',
        'question_id',
    ];

    public $hidden = [
        'iscorrectly'
    ];

    public $timestamps = false;

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
