<?php

namespace App\Models;

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
 * @property boolean $is_active
 * @property boolean $is_skip
 * @method static \Illuminate\Database\Query\Builder|\App\Question whereIsActive($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Question whereIsSkip($value)
 */
class Question extends Model
{
    const SINGLE_TYPE = 'single';
    const MULTISELECT_TYPE = 'multiselect';
    const WRITE_RESULT_TYPE = 'write-result';
    const TO_MATCH = 'to-match';
    const YES_OR_NO_TYPE = 'yes-or-no';

    /**
     * @var array
     */
    public $fillable = [
        'name',
        'short_name',
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

    /**
     * @param $value
     */
    public function setNameAttribute($value)
    {
        $short_name = implode(' ', array_slice(explode(' ', strip_tags($value)), 0, 4));

        $this->attributes['name'] = $value;
        $this->attributes['short_name'] = $short_name;
    }
}
