<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    public static $types = [
        'single',
        'multiple',
        'writable',
    ];

    public $fillable = [
        'name',
        'time',
        'faculty_id',
        'code'
    ];

    public $timestamps = false;

    public function getRouteKeyName()
    {
        return 'code';
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

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
