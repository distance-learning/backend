<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Score
 * @package App
 */
class Score extends Model
{
    /**
     * @var array
     */
    public $fillable = [
        'score',
        'student_id',
        'test_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function test()
    {
        return $this->belongsTo(Test::class);
    }
}
