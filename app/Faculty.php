<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faculty extends Model
{
    use SoftDeletes;

    public $timestamps = false;

    public $fillable = [
        'name',
        'description',
        'avatar'
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

    public function departments()
    {
        return $this->hasMany(\App\Department::class);
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
}
