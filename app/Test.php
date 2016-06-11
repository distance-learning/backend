<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Test
 *
 * @package App
 * @property integer $id
 * @property string $name
 * @property integer $time
 * @property integer $faculty_id
 * @property string $code
 * @property-read \App\Faculty $faculty
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Question[] $questions
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Score[] $scores
 * @method static \Illuminate\Database\Query\Builder|\App\Test whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Test whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Test whereTime($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Test whereFacultyId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Test whereCode($value)
 * @mixin \Eloquent
 * @property boolean $allow_skip
 * @method static \Illuminate\Database\Query\Builder|\App\Test whereAllowSkip($value)
 */
class Test extends Model
{
    /**
     * @var array
     */
    public static $types = [
        'single',
        'multiple',
        'writable',
    ];

    /**
     * @var array
     */
    public $fillable = [
        'name',
        'time',
        'faculty_id',
        'code',
        'allow_skip',
        'allow_export',
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
    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function scores()
    {
        return $this->hasMany(Score::class);
    }
}
