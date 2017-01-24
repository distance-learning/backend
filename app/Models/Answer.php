<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Answer
 *
 * @package App
 * @property integer $id
 * @property string $body
 * @property boolean $is_correct
 * @property integer $question_id
 * @property-read Question $question
 * @method static Builder|Answer whereId($value)
 * @method static Builder|Answer whereBody($value)
 * @method static Builder|Answer whereis_correct($value)
 * @method static Builder|Answer whereQuestionId($value)
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
        'is_correct',
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
