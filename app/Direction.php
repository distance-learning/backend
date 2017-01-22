<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Direction
 *
 * @package App
 * @property integer $id
 * @property string $name
 * @property string $slug
 * @property string $description
 * @property integer $faculty_id
 * @property string $deleted_at
 * @property-read \App\User $faculty
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Subject[] $subjects
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Group[] $groups
 * @method static \Illuminate\Database\Query\Builder|\App\Direction whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Direction whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Direction whereSlug($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Direction whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Direction whereFacultyId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Direction whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Direction findBySlug($slug)
 * @mixin \Eloquent
 */
class Direction extends Model
{
    use Sluggable;

    /**
     * @var array
     */
    public $fillable = [
        'name',
        'description',
        'faculty_id'
    ];

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
        ];
    }

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function faculty()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function groups()
    {
        return $this->hasMany(Group::class);
    }

    /**
     * @param $query
     * @param $slug
     * @return mixed
     */
    public function scopeFindBySlug($query, $slug)
    {
        return $this->where('slug', $slug);
    }
}
