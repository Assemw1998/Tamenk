<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    public function superAdminUpdatedBy()
    {
        return $this->belongsTo(SuperAdmin::class, 'updated_by_id');
    }

    public function superAdminCreatedBy()
    {
        return $this->belongsTo(SuperAdmin::class, 'created_by_id');
    }

    public static function boot()
    {
        parent::boot();

        self::creating(function ($country) {
            $country->created_by_id = auth()->user()->id;
            $country->updated_by_id = auth()->user()->id;
        });

        self::created(function ($country) {
            // ... code here
        });

        self::updating(function ($country) {
            $country->updated_by_id = auth()->user()->id;
        });

        self::updated(function ($country) {
            // ... code here
        });

        self::deleting(function ($country) {
            // ... code here
        });

        self::deleted(function ($country) {
            // ... code here
        });
    }
}