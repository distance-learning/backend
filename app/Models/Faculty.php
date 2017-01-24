<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Faculty
 *
 * @package App
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $avatar
 * @property string $slug
 * @property \Carbon\Carbon $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $faculty_administrator
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Direction[] $directions
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Subject[] $subjects
 * @method static \Illuminate\Database\Query\Builder|\App\Faculty whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Faculty whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Faculty whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Faculty whereAvatar($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Faculty whereSlug($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Faculty whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Faculty random($count)
 * @mixin \Eloquent
 * @property string $examinations
 * @property integer $avatar_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $teachers
 * @method static \Illuminate\Database\Query\Builder|\App\Faculty whereExaminations($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Faculty whereAvatarId($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Test[] $tests
 */
class Faculty extends Model
{
    use SoftDeletes;

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    public $fillable = [
        'name',
        'description',
        'avatar',
        'examinations'
    ];

    /**
     * @return array
     */
    public function sluggable() {
        return [
            'slug' => [
                'source' => 'name',
            ]
        ];
    }

    /**
     * @var array
     */
    protected $sluggable = [
        'build_from' => 'name',
        'save_to'    => 'slug',
    ];

    /**
     * @var array
     */
    protected $dates = [
        'deleted_at'
    ];

    /**
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'description' => 'required'
    ];

    /**
     * @var array
     */
    protected $casts = [
        'examinations' => 'array'
    ];

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * @deprecated
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function faculty_administrator()
    {
        return $this->morphTo(User::class, 'structure');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function users()
    {
        return $this->morphMany(User::class, 'structure');
    }

    /**
     * @return mixed
     */
    public function teachers()
    {
        return $this->morphMany(User::class, 'structure')->where('role', 'teacher');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function directions()
    {
        return $this->hasMany(Direction::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function avatar()
    {
        return $this->belongsTo(File::class, 'avatar_id');
    }

    /**
     * @param $query
     * @param $count
     * @return mixed
     */
    public function scopeRandom($query, $count)
    {
        $totalRows = static::count() - 1;
        $skip = $totalRows > 0 ? mt_rand(0, $totalRows) : 0;

        return $query->skip($skip)->take($count);
    }

    /**
     * @param $value
     * @return array|mixed
     */
    public function getExaminationsAttribute($value)
    {
        if (is_null($value)) {
            return [];
        }

        return json_decode($value);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tests()
    {
        return $this->hasMany(Test::class, 'faculty_id');
    }
}
