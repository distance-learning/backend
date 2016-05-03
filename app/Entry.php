<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Entry
 *
 * @package App
 * @property integer $id
 * @property integer $author_id
 * @property string $message
 * @property integer $course_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\User $author
 * @property-read \App\Course $course
 * @method static \Illuminate\Database\Query\Builder|\App\Entry whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entry whereAuthorId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entry whereMessage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entry whereCourseId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entry whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entry whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Entry extends Model
{
    /**
     * @var array
     */
    public $fillable = [
        'author_id',
        'message',
        'course_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
       return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
