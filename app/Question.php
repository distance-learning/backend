<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Question
 *
 * @package App
 * @property integer $id
 * @property string $name
 * @property string $image
 * @property string $type
 * @property integer $test_id
 * @property string $code
 * @property float $score
 * @property integer $time
 * @property-read \App\Test $test
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Answer[] $answers
 * @method static \Illuminate\Database\Query\Builder|\App\Question whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Question whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Question whereImage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Question whereType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Question whereTestId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Question whereCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Question whereScore($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Question whereTime($value)
 * @mixin \Eloquent
 */
class Question extends Model
{
    /**
     * @var array
     */
    public $fillable = [
        'name',
        'image',
        'type',
        'test_id',
        'code',
        'time',
        'score',
        'is_active',
        'is_skip'
    ];

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'code';
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
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
