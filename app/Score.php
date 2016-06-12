<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Score
 *
 * @package App
 * @property integer $id
 * @property float $score
 * @property integer $student_id
 * @property integer $test_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\User $student
 * @property-read \App\Test $test
 * @method static \Illuminate\Database\Query\Builder|\App\Score whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Score whereScore($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Score whereStudentId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Score whereTestId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Score whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Score whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\UserAnswer[] $userAnswers
 */
class Score extends Model
{
    /**
     * @var array
     */
    public $fillable = [
        'score',
        'student_id',
        'test_id',
        'score_total'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function test()
    {
        return $this->belongsTo(Test::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userAnswers()
    {
        return $this->hasMany(UserAnswer::class);
    }
}
