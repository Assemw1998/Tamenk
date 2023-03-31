<?php

namespace App\Http\Controllers\admins_side\common\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Customer;
use App\Models\InsuranceCompany;

class IndexController extends Controller
{
    public function index()
    {
        $isSuperAdmin = (auth()->user() instanceof \app\models\SuperAdmin);
        $adminsCount = Admin::count();
        $customerCount= Customer::count();
        $insuranceCompaniesCount = InsuranceCompany::count();
        return view('admins_side.common.dashboard.index', ['isSuperAdmin' => $isSuperAdmin, "adminsCount" => $adminsCount,'customerCount'=>$customerCount,'insuranceCompaniesCount'=>$insuranceCompaniesCount]);
    }
}