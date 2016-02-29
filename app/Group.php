<?php

namespace App;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

class Group extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $sluggable = [
        'build_from' => 'name',
        'save_to'    => 'slug',
    ];

    public $fillable = [
        'name',
        'direction_id',
        'year_of_entry'
    ];

    public $timestamps = false;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function students()
    {
        return $this->hasMany(User::class);
    }

    public function direction()
    {
        return $this->belongsTo(Direction::class);
    }
}
