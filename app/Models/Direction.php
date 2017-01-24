<?php

namespace App\Models;

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
 * @property-read User $faculty
 * @property-read Collection|Subject[] $subjects
 * @property-read Collection|Group[] $groups
 * @method static Builder|Direction whereId($value)
 * @method static Builder|Direction whereName($value)
 * @method static Builder|Direction whereSlug($value)
 * @method static Builder|Direction whereDescription($value)
 * @method static Builder|Direction whereFacultyId($value)
 * @method static Builder|Direction whereDeletedAt($value)
 * @method static Builder|Direction findBySlug($slug)
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
