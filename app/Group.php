<?php

namespace App;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Group
 *
 * @package App
 * @property integer $id
 * @property string $name
 * @property string $slug
 * @property integer $direction_id
 * @property integer $year_of_entry
 * @property string $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $students
 * @property-read \App\Direction $direction
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Course[] $courses
 * @method static \Illuminate\Database\Query\Builder|\App\Group whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Group whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Group whereSlug($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Group whereDirectionId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Group whereYearOfEntry($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Group whereDeletedAt($value)
 * @mixin \Eloquent
 */
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

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function students()
    {
        return $this->hasMany(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function direction()
    {
        return $this->belongsTo(Direction::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    /**
     *
     */
    public function setYearOfEntryAttribute()
    {
        $this->attributes['year_of_entry'] = Carbon::now()->format('Y');
    }
}
