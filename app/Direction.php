<?php

namespace App;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

class Direction extends Model implements SluggableInterface
{
    use SluggableTrait;

    public $timestamps = false;

    protected $sluggable = [
        'build_from' => 'name',
        'save_to'    => 'slug',
    ];

    public function faculty()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function subjects()
    {
        return $this->hasMany(\App\Subject::class);
    }
}