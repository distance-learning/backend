<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Course
 * @package App
 */
class Course extends Model
{
    /**
     * @var array
     */
    public $fillable = [
        'subject_id',
        'teacher_id',
        'group_id',
        'slug',
    ];

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group()
    {
        return $this->belongsTo(\App\Group::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subject()
    {
        return $this->belongsTo(\App\Subject::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function teacher()
    {
        return $this->belongsTo(\App\Teacher::class);
    }

    /**
     * @param $scope
     * @param $teacher_id
     * @param $subject_id
     * @return mixed
     */
    public function scopeFindBySubjectAndTeacher($scope, $teacher_id, $subject_id)
    {
        return $scope
            ->where('teacher_id', $teacher_id)
            ->where('subject_id', $subject_id)
        ;
    }
}
