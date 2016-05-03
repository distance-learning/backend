<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Subject
 * @package App
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }
}
