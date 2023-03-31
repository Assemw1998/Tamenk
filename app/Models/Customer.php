<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
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
    
    public function adminUpdatedBy()
    {
        return $this->belongsTo(Admin::class, 'updated_by_id');
    }

    public function adminCreatedBy()
    {
        return $this->belongsTo(Admin::class, 'created_by_id');
    }

    public function make()
    {
        return $this->belongsTo(CarMake::class, 'car_make_id');
    }

    public function model()
    {
        return $this->belongsTo(CarModel::class, 'car_model_id');
    }

    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public static function boot()
    {
        parent::boot();

        self::creating(function ($customer) {
            if(auth()->user() instanceof \app\models\SuperAdmin){
                $customer->created_portal = config('constants.sides.super_admin');
                $customer->updated_portal = config('constants.sides.super_admin');
            }else{
                $customer->created_portal = config('constants.sides.admin');
                $customer->updated_portal = config('constants.sides.admin');
            }
            $customer->created_by_id = auth()->user()->id;
            $customer->updated_by_id = auth()->user()->id;
        });

        self::created(function ($customer) {
            // ... code here
        });

        self::updating(function ($customer) {
            if(auth()->user() instanceof \app\models\SuperAdmin){
                $customer->updated_portal = config('constants.sides.super_admin');
            }else{
                $customer->updated_portal = config('constants.sides.admin');
            }
            $customer->updated_by_id = auth()->user()->id;
        });

        self::updated(function ($customer) {
            // ... code here
        });

        self::deleting(function ($customer) {
            // ... code here
        });

        self::deleted(function ($customer) {
            // ... code customer
        });
    }

    public function getCreatedPortalNameAttribute()
    {
        return $this->created_portal==1 ? "Super Admin" : "Admin";
    }

    public function getUpdatedPortalNameAttribute()
    {
        return $this->updated_portal==1 ? "Super Admin" : "Admin";
    }
}
