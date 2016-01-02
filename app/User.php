<?php

namespace App;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\Hash;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract,
                                    SluggableInterface
{
    use Authenticatable, Authorizable, CanResetPassword, SluggableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'surname',
        'birthday',
        'phone',
        'email',
        'password',
        'role',
        'structure_id',
        'structure_type',
        'status'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'token',
        'structure_id',
        'structure_type'
    ];

    protected $sluggable = [
        'build_from' => 'fullname',
        'save_to'    => 'slug',
    ];

    public static $rules = [
        'name'  =>  'required',
        'surname'  =>  'required',
        'email'   =>  'required|email|unique:users',
        'password'    =>   'required|confirmed'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function structure()
    {
        return $this->morphTo();
    }

    /**
     * @param $query
     * @param $slug
     * @return mixed
     */
    public function scopeFindBySlug($query, $slug)
    {
        return $query->where('slug', $slug);
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function subjects()
    {
        return $this->belongsToMany(\App\Subject::class, 'teacher_subject', 'user_id', 'subject_id');
    }

    public function getFullnameAttribute()
    {
        return $this->surname . " " . $this->name;
    }
}
