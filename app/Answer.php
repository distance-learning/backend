<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Answer
 *
 * @package App
 * @property integer $id
 * @property string $body
 * @property boolean $isCorrectly
 * @property integer $question_id
 * @property-read \App\Question $question
 * @method static \Illuminate\Database\Query\Builder|\App\Answer whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Answer whereBody($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Answer whereIsCorrectly($value)
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
        'iscorrectly',
        'question_id',
    ];

    /**
     * @var array
     */
    public $hidden = [
        'iscorrectly'
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
