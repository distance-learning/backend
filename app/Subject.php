<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Subject
 *
 * @package App
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $deleted_at
 * @property integer $faculty_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Teacher[] $teachers
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Course[] $courses
 * @property-read \App\Faculty $faculty
 * @method static \Illuminate\Database\Query\Builder|\App\Subject whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Subject whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Subject whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Subject whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Subject whereFacultyId($value)
 * @mixin \Eloquent
 */
class Subject extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'faculty_id'
    ];

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function group()
    {
        return $this->hasManyThrough(Group::class, Course::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }
}
