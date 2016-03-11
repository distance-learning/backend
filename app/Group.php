<?php

namespace App;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

class Group extends Model implements SluggableInterface
{
    use SluggableTrait;

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

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function setYearOfEntryAttribute()
    {
        $this->attributes['year_of_entry'] = Carbon::now()->format('Y');
    }
}
