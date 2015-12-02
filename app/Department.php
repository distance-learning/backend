<?php

namespace App;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

class Department extends Model implements SluggableInterface
{
    use SluggableTrait;

    public $timestamps = false;

    protected $sluggable = [
        'build_from' => 'name',
        'save_to'    => 'slug',
    ];

    public function teacher()
    {
        return $this->morphMany(\App\User::class, 'structure');
    }

    public function faculty()
    {
        return $this->belongsTo(\App\User::class);
    }
}
