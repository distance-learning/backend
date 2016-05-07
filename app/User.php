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

/**
 * Class User
 *
 * @package App
 * @property integer $id
 * @property string $name
 * @property string $surname
 * @property string $avatar
 * @property string $birthday
 * @property string $phone
 * @property string $slug
 * @property string $role
 * @property integer $structure_id
 * @property string $structure_type
 * @property string $email
 * @property string $token
 * @property boolean $status
 * @property string $description
 * @property string $password
 * @property string $deleted_at
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $new_password
 * @property integer $group_id
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $structure
 * @property-read \App\Group $group
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Course[] $courses
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Subject[] $subjects
 * @property-read mixed $fullname
 * @method static \Illuminate\Database\Query\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereSurname($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereAvatar($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereBirthday($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User wherePhone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereSlug($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereRole($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereStructureId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereStructureType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereNewPassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereGroupId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User active()
 * @mixin \Eloquent
 */
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
        'status',
        'token',
        'new_password',
        'group_id',
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
        'structure_type',
        'new_password',
        'group_id'
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    /**
     * @var array
     */
    protected $sluggable = [
        'build_from' => 'fullname',
        'save_to'    => 'slug',
    ];

    /**
     * @var array
     */
    public static $rules = [
        'name'  =>  'required',
        'surname'  =>  'required',
        'email'   =>  'required|unique:users',
        'password'    =>   'required|confirmed'
    ];

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function structure()
    {
        return $this->morphTo();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function courses()
    {
        return $this->hasMany(Course::class, 'teacher_id');
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'teacher_subject', 'user_id', 'subject_id');
    }

    /**
     * @return string
     */
    public function getFullnameAttribute()
    {
        return $this->surname . " " . $this->name;
    }

    /**
     * @param $value
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    /**
     * @return bool
     */
    public function isStudent()
    {
        return ($this->role == "student") ? true : false;
    }

    /**
     * @return bool
     */
    public function isTeacher()
    {
        return ($this->role == "teacher") ? true : false;
    }

    public function isActive()
    {
        return $this->status?:false;
    }
}
