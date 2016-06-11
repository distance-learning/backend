<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Answer
 *
 * @package App
 * @property integer $id
 * @property string $body
 * @property boolean $is_correct
 * @property integer $question_id
 * @property-read \App\Question $question
 * @method static \Illuminate\Database\Query\Builder|\App\Answer whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Answer whereBody($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Answer whereis_correct($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Answer whereQuestionId($value)
 * @mixin \Eloquent
 */
class Answer extends Model
{
    /**
     * @var array
     */
    public $fillable = [
        'body',
        'is_correct',
        'question_id',
    ];

    /**
     * @var array
     */
    public $hidden = [
        'is_correct'
    ];

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
