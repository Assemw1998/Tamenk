<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as ModelLaravel;

class InsuranceCompany extends ModelLaravel
{
    use HasFactory;

    public function superAdminCreatedBy()
    {
        return $this->belongsTo(SuperAdmin::class, 'created_by_id');
    }

    public function superAdminUpdatedBy()
    {
        return $this->belongsTo(SuperAdmin::class, 'updated_by_id');
    }

    public function companyLogo()
    {
        return $this->hasOne(InsuranceCompanyLogos::class,'insurance_company_id');
    }

    public static function boot()
    {
        parent::boot();

        self::creating(function ($insuranceCompany) {
            $insuranceCompany->created_by_id = auth()->user()->id;
            $insuranceCompany->updated_by_id = auth()->user()->id;
        });

        self::created(function ($insuranceCompany) {
            // ... code here
        });

        self::updating(function ($insuranceCompany) {
            $insuranceCompany->updated_by_id = auth()->user()->id;
        });

        self::updated(function ($insuranceCompany) {
            // ... code here
        });

        self::deleting(function ($insuranceCompany) {
            // ... code here
        });

        self::deleted(function ($insuranceCompany) {
            // ... code here
        });
    }
}
