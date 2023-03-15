<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public const STATUS_ACTIVE = 1;
    public const STATUS_INACTIVE = 0;
    
    protected $fillable = [
        'full_name',
        'email',
        'username',
        'password',
        'phone_number',
        'status',
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

    /**
     * Always encrypt the password when it is updated.
     *
     * @param $value
     * @return string
     */

    public static function boot()
    {
        parent::boot();

        self::creating(function ($admin) {
            $admin->created_by_id = auth()->user()->id;
            $admin->updated_by_id = auth()->user()->id;
        });

        self::created(function ($admin) {
            // ... code here
        });

        self::updating(function ($admin) {
            $admin->updated_by_id = auth()->user()->id;
        });

        self::updated(function ($admin) {
            // ... code here
        });

        self::deleting(function ($admin) {
            // ... code here
        });

        self::deleted(function ($admin) {
            // ... code here
        });
    }

    public function superAdminUpdatedBy()
    {
        return $this->belongsTo(SuperAdmin::class, 'updated_by_id');
    }

    public function superAdminCreatedBy()
    {
        return $this->belongsTo(SuperAdmin::class, 'created_by_id');
    }


    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function getStatusLabelAttribute()
    {
        return $this->status ? "Active" : "Inactive";
    }
}
