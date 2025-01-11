<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Role;
use Laravel\Sanctum\HasApiTokens;
use App\Permissions\HasPermissionsTrait;
use     Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;



use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;



class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,LogsActivity;
    use HasPermissionsTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['*']);
        // Chain fluent methods for configuration options
    }


    public function roles(){
        return $this->belongsToMany(Role::class,'users_roles');

    }
    public function instituteUser()
    {
        return $this->belongsTo(InstituteUser::class, 'id', 'Uid');
    }
}
