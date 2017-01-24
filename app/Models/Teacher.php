<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Teacher
 *
 * @package App
 * @property integer $id
 * @property integer $teacher_id
 * @property integer $subject_id
 * @property integer $direction_id
 * @property-read \App\User $teacher
 * @property-read \App\Subject $subject
 * @property-read \App\Direction $department
 * @method static \Illuminate\Database\Query\Builder|\App\Teacher whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Teacher whereTeacherId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Teacher whereSubjectId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Teacher whereDirectionId($value)
 * @mixin \Eloquent
 */
class Teacher extends Model
{
    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function teacher()
    {
        return $this->belongsTo(User::class);
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
    public function department()
    {
        return $this->belongsTo(Direction::class);
    }
}
