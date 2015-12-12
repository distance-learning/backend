<?php

namespace App;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faculty extends Model implements SluggableInterface
{
    use SluggableTrait, SoftDeletes;

    public $timestamps = false;

    public $fillable = [
        'name',
        'description',
        'avatar'
    ];

    protected $sluggable = [
        'build_from' => 'name',
        'save_to'    => 'slug',
    ];

    protected $dates = [
        'deleted_at'
    ];

    public static $rules = [
        'name' => 'required',
        'description' => 'required'
    ];

    public function faculty_administrator()
    {
        return $this->morphTo(\App\User::class, 'structure');
    }

    public function directions()
    {
        return $this->hasMany(\App\Direction::class);
    }

    public function subjects()
    {
        return $this->hasManyThrough(\App\Subject::class, \App\Direction::class);
    }

    public function scopeFindBySlug($query, $slug)
    {
        return $query->where('slug', $slug)->first();
    }

    public function scopeRandom($query, $count)
    {
        $totalRows = static::count() - 1;
        $skip = $totalRows > 0 ? mt_rand(0, $totalRows) : 0;

        return  $query->skip($skip)->take($count);
    }

    public function teachers()
    {
        return $this->morphMany(\App\User::class, 'structure');
    }
}
