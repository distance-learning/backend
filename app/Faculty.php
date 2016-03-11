<?php

namespace App;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faculty extends Model implements SluggableInterface
{
    use SluggableTrait, SoftDeletes;

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    public $fillable = [
        'name',
        'description',
        'avatar'
    ];

    /**
     * @var array
     */
    protected $sluggable = [
        'build_from' => 'name',
        'save_to'    => 'slug',
    ];

    /**
     * @var array
     */
    protected $dates = [
        'deleted_at'
    ];

    /**
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'description' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function faculty_administrator()
    {
        return $this->morphTo(\App\User::class, 'structure');
    }

    /**
     * @return mixed
     */
    public function students()
    {
        return $this->morphMany(User::class, 'structure')
            ->where('role', 'student')
            ->get()
        ;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function teachers()
    {
        return $this->morphMany(User::class, 'structure')
            ->where('role', 'teacher')
            ->get()
        ;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function directions()
    {
        return $this->hasMany(\App\Direction::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function subjects()
    {
        return $this->hasManyThrough(\App\Subject::class, \App\Direction::class);
    }

    /**
     * @param $query
     * @param $slug
     * @return mixed
     */
    public function scopeFindBySlug($query, $slug)
    {
        return $query->where('slug', $slug)->first();
    }

    /**
     * @param $query
     * @param $count
     * @return mixed
     */
    public function scopeRandom($query, $count)
    {
        $totalRows = static::count() - 1;
        $skip = $totalRows > 0 ? mt_rand(0, $totalRows) : 0;

        return  $query->skip($skip)->take($count);
    }
}
