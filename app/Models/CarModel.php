<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as ModelLaravel;

class CarModel extends ModelLaravel
{
    use HasFactory;

    public function carMake()
    {
        return $this->belongsTo(CarMake::class,  'make_id');
    }

    public function superAdminCreatedBy()
    {
        return $this->belongsTo(SuperAdmin::class, 'created_by_id');
    }

    public function superAdminUpdatedBy()
    {
        return $this->belongsTo(SuperAdmin::class, 'updated_by_id');
    }

    public static function boot()
    {
        parent::boot();

        self::creating(function ($carModel) {
            $carModel->created_by_id = auth()->user()->id;
            $carModel->updated_by_id = auth()->user()->id;
        });

        self::created(function ($carModel) {
            // ... code here
        });

        self::updating(function ($carModel) {
            $carModel->updated_by_id = auth()->user()->id;
        });

        self::updated(function ($carModel) {
            // ... code here
        });

        self::deleting(function ($carModel) {
            // ... code here
        });

        self::deleted(function ($carModel) {
            // ... code here
        });
    }
}
