<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\UserAnswer
 *
 * @property integer $id
 * @property integer $question_id
 * @property integer $score_id
 * @property boolean $is_correct
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Question $question
 * @property-read \App\Score $score
 * @method static \Illuminate\Database\Query\Builder|\App\UserAnswer whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\UserAnswer whereQuestionId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\UserAnswer whereScoreId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\UserAnswer whereIsCorrect($value)
 * @method static \Illuminate\Database\Query\Builder|\App\UserAnswer whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\UserAnswer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UserAnswer extends Model
{
    public $table = 'user_answers';

    /**
     * @var array
     */
    public $fillable = [
        'question_id',
        'score_id',
        'is_correct',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function score()
    {
        return $this->belongsTo(Score::class);
    }
}
