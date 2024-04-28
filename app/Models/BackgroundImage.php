<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class  BackgroundImage extends Model
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

        self::creating(function ($backgroundImage) {
            $backgroundImage->created_by_id = auth()->user()->id;
            $backgroundImage->updated_by_id = auth()->user()->id;
        });

        self::created(function ($backgroundImage) {
            // ... code here
        });

        self::updating(function ($backgroundImage) {
            $backgroundImage->updated_by_id = auth()->user()->id;
        });

        self::updated(function ($backgroundImage) {
            // ... code here
        });

        self::deleting(function ($backgroundImage) {
            // ... code here
        });

        self::deleted(function ($backgroundImage) {
            // ... code here
        });
    }
}