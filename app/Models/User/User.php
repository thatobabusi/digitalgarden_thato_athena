<?php

namespace App\Models\User;

use App\Models\AccessControl\Role;
use App\Models\Blog\BlogPost;
use Carbon\Carbon;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Passport\HasApiTokens;

/**
 * App\Models\User\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $class_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Blog\BlogPost[] $blogPosts
 * @property-read int|null $blog_posts_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Client[] $clients
 * @property-read int|null $clients_count
 * @property-read bool $is_admin
 * @property-read bool $is_student
 * @property-read bool $is_teacher
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\AccessControl\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Token[] $tokens
 * @property-read int|null $tokens_count
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\User newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User\User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\User query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\User whereClassId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User\User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User\User withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\User disableCache()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\User withCacheCooldownSeconds($seconds = null)
 */
class User extends Authenticatable
{
    use Cachable, SoftDeletes, Notifiable, HasApiTokens;

    public $table = 'users';

    /**
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'email_verified_at',
    ];

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'created_at',
        'updated_at',
        'deleted_at',
        'remember_token',
        'email_verified_at',
    ];

    /*******************************************************************************************************************
     *############################                  RELATIONS           ################################################
     ******************************************************************************************************************/

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function blogPosts()
    {
        return $this->hasMany(BlogPost::class);
    }

    /*******************************************************************************************************************
     *############################                  GETTERS             ################################################
     ******************************************************************************************************************/

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFullName()
    {
        return  Str::title($this->name);
    }

    /**
     * @return bool
     */
    public function getIsAdminAttribute()
    {
        return $this->roles()->where('id', 1)->exists();
    }

    /**
     * @return bool
     */
    public function getIsTeacherAttribute()
    {
        return $this->roles()->where('id', 3)->exists();
    }

    /**
     * @return bool
     */
    public function getIsStudentAttribute()
    {
        return $this->roles()->where('id', 4)->exists();
    }

    /**
     * @param string|null $value
     *
     * @return string|null
     */
    public function getCreatedAtAttribute(string $value = null)
    {
        return $this->attributes['created_at'] = Carbon::parse($value)->toDateTimeString() ?? null;
    }

    /**
     * @param string|null $value
     *
     * @return string|null
     */
    public function getUpdatedAtAttribute(string $value = null)
    {
        return $this->attributes['updated_at'] = Carbon::parse($value)->toDateTimeString() ?? null;
    }

    /**
     * @param string|null $value
     *
     * @return string|null
     */
    public function getDeletedAtAttribute(string $value = null)
    {
        return $this->attributes['deleted_at'] = Carbon::parse($value)->toDateTimeString() ?? null;
    }

    /**
     * @param string|null $value
     *
     * @return string|null
     */
    public function getEmailVerifiedAtAttribute(string $value = null)
    {
        //$value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;

        $return = null;

        if($value) {
            $val = Carbon::createFromFormat('Y-m-d H:i:s', $value);
            if($val) {
                $return = $val->format(config('panel.date_format') . ' ' . config('panel.time_format'));
            }
        }
        return $return;
    }

    /*******************************************************************************************************************
     *############################                  SETTERS             ################################################
     ******************************************************************************************************************/

    /**
     * @param string $input
     *
     * @return string|null
     */
    public function setPasswordAttribute(string $input)
    {
        if ($input) {
            return $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
        }

        return null;
    }

    /**
     * @param string $token
     *
     * @return bool|void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));

        return true;
    }

    /**
     * @param string $value
     *
     * @return string|null
     */
    public function setCreatedAtAttribute(string $value)
    {
        return $this->attributes['created_at'] = Carbon::parse($value)->toDateTimeString() ?? null;
    }

    /**
     * @param string $value
     *
     * @return string|null
     */
    public function setUpdatedAtAttribute(string $value)
    {
        return $this->attributes['updated_at'] = Carbon::parse($value)->toDateTimeString() ?? null;
    }

    /**
     * @param string $value
     *
     * @return string|null
     */
    public function setDeletedAtAttribute(string $value)
    {
        return $this->attributes['deleted_at'] = Carbon::parse($value)->toDateTimeString() ?? null;
    }

    /**
     * @param string $value
     *
     * @return string|null
     */
    public function setEmailVerifiedAtAttribute(string $value)
    {
        //$this->attributes['email_verified_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;

        $return = null;

        if($value) {
            $val = Carbon::createFromFormat('Y-m-d H:i:s', $value);
            if($val) {
                $return = $val->format(config('panel.date_format') . ' ' . config('panel.time_format'));
            }
        }

        return $this->attributes['email_verified_at'] = $return;
    }

}
