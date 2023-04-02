<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
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

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function insuranceCompany()
    {
        return $this->belongsTo(InsuranceCompany::class, 'insurance_company_id');
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

        self::creating(function ($quotation) {
            if(auth()->user() instanceof \app\models\SuperAdmin){
                $quotation->created_portal = config('constants.sides.super_admin');
                $quotation->updated_portal = config('constants.sides.super_admin');
            }else{
                $quotation->created_portal = config('constants.sides.admin');
                $quotation->updated_portal = config('constants.sides.admin');
            }
            $quotation->created_by_id = auth()->user()->id;
            $quotation->updated_by_id = auth()->user()->id;
        });

        self::created(function ($quotation) {
            // ... code here
        });

        self::updating(function ($quotation) {
            if(auth()->user() instanceof \app\models\SuperAdmin){
                $quotation->updated_portal = config('constants.sides.super_admin');
            }else{
                $quotation->updated_portal = config('constants.sides.admin');
            }
            $quotation->updated_by_id = auth()->user()->id;
        });

        self::updated(function ($quotation) {
            // ... code here
        });

        self::deleting(function ($quotation) {
            // ... code here
        });

        self::deleted(function ($quotation) {
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

    public function getInsuranceTypeValueAttribute()
    {
        $types=config('constants.insurance_types');
        return $types[$this->insurance_type];
    }

    public function getExtraInformationInputsAsArrayAttribute()
    {
        return  json_decode($this->extra_information_inputs);
    }
}
