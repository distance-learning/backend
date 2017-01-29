<?php

namespace App\Models;

use App\Events\CreatingUserEvent;
use Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

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
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string $new_password
 * @property integer $group_id
 * @property-read Model|Eloquent $structure
 * @property-read Group $group
 * @property-read Collection|Course[] $courses
 * @property-read Collection|Subject[] $subjects
 * @property-read mixed $fullname
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereName($value)
 * @method static Builder|User whereSurname($value)
 * @method static Builder|User whereAvatar($value)
 * @method static Builder|User whereBirthday($value)
 * @method static Builder|User wherePhone($value)
 * @method static Builder|User whereSlug($value)
 * @method static Builder|User whereRole($value)
 * @method static Builder|User whereStructureId($value)
 * @method static Builder|User whereStructureType($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereToken($value)
 * @method static Builder|User whereStatus($value)
 * @method static Builder|User whereDescription($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User whereDeletedAt($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @method static Builder|User whereNewPassword($value)
 * @method static Builder|User whereGroupId($value)
 * @method static Builder|User active()
 * @mixin Eloquent
 * @property-read Collection|File[] $files
 * @property-read Collection|ModuleGroup[] $moduleGroups
 * @property integer $avatar_id
 * @property-read Collection|Task[] $tasks
 * @method static Builder|User whereAvatarId($value)
 */
class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, Sluggable;

    const STUDENT_ROLE = 'student';
    const TEACHER_ROLE = 'teacher';
    const ADMIN_ROLE = 'admin';

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
        'description',
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

    /**
     * @var array
     */
    protected $casts = [
        'status' => 'boolean',
    ];

    /**
     * @var array
     */
    public static $rulesRegistration = [
        'name'  =>  'required',
        'surname'  =>  'required',
        'email'   =>  'required|email|unique:users',
        'password'    =>   'required|confirmed'
    ];

    /**
     * @var array
     */
    public static $rulesAuthorization = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    /**
     * @var array
     */
    public static $rulesResetPassword = [
        'email' => 'required',
        'password' => 'required|confirmed',
    ];

    /**
     * @var array
     */
    public static $rulesUpdatePassword = [
        'password' => 'required|confirmed',
    ];

    /**
     * List of model events
     *
     * @var array
     */
    protected $events = [
        'creating' => CreatingUserEvent::class,
    ];

    /**
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'fullname'
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function files()
    {
        return $this->hasMany(File::class, 'author_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function avatar()
    {
        return $this->belongsTo(File::class, 'avatar_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function moduleGroups()
    {
        return $this->hasMany(ModuleGroup::class, 'teacher_id');
    }

    /**
     * @return string
     */
    public function getFullnameAttribute()
    {
        return $this->surname . " " . $this->name;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks()
    {
        return $this->hasMany(Task::class, 'recipient_id');
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
        return ($this->role == "student")?:false;
    }

    /**
     * @return bool
     */
    public function isTeacher()
    {
        return ($this->role == "teacher")?:false;
    }

    /**
     * @return bool
     */
    public function isActive()
    {
        return $this->status?:false;
    }

    /**
     * @return bool
     */
    public function isAdmin()
    {
        return ($this->role == "admin")?:false;
    }

    /**
     * @return HasMany
     */
    public function tests()
    {
        return $this->hasMany(Test::class, 'created_by');
    }
}
