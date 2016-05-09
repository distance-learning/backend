<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Course
 *
 * @package App
 * @property integer $id
 * @property integer $subject_id
 * @property integer $teacher_id
 * @property integer $group_id
 * @property string $slug
 * @property string $deleted_at
 * @property-read \App\Group $group
 * @property-read \App\Subject $subject
 * @property-read \App\Teacher $teacher
 * @method static \Illuminate\Database\Query\Builder|\App\Course whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Course whereSubjectId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Course whereTeacherId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Course whereGroupId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Course whereSlug($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Course whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Course findBySubjectAndTeacher($teacher_id, $subject_id)
 * @mixin \Eloquent
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
        return $this->belongsTo(Group::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function teacher()
    {
        return $this->belongsTo(User::class);
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
