<?php

namespace App\Models;

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
 * @property-read Faculty $faculty
 * @property-read Collection|Question[] $questions
 * @property-read Collection|Score[] $scores
 * @method static Builder|Test whereId($value)
 * @method static Builder|Test whereName($value)
 * @method static Builder|Test whereTime($value)
 * @method static Builder|Test whereFacultyId($value)
 * @method static Builder|Test whereCode($value)
 * @mixin \Eloquent
 * @property boolean $allow_skip
 * @method static Builder|Test whereAllowSkip($value)
 */
class Test extends Model
{
    /**
     * @var array
     */
    public static $types = [
        'single',
        'multiselect',
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
        'count_questions',
        'created_by'
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
