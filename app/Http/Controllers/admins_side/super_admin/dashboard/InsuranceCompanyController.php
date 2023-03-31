<?php

namespace App\Http\Controllers\admins_side\super_admin\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InsuranceCompany;
use App\Models\InsuranceCompanyLogos;

class InsuranceCompanyController  extends Controller
{
    public function index()
    {
        $insuranceCompanies= InsuranceCompany::all();
        return view('admins_side.super_admin.dashboard.insurance_company.index', ['insuranceCompanies' => $insuranceCompanies]);
    }

    public function createView()
    {
        return view('admins_side.super_admin.dashboard.insurance_company.create');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);

        $insuranceCompany = new InsuranceCompany;
        $insuranceCompany->name = $request->name;
  

        if ($insuranceCompany->save()) {

            $licenseImageFile=$request->file('company_logo');
            $insuranceCompanyLogos = new InsuranceCompanyLogos;
            $path = $licenseImageFile->store('/images/resource', ['disk' =>   'images']);
            $insuranceCompanyLogos->logo_url = $path;
            $insuranceCompanyLogos->insurance_company_id = $insuranceCompany->id;
            $insuranceCompanyLogos->save();
            
            return redirect()->route('super-admin.dashboard.insurance-company-view', ['id' => $insuranceCompany->id]);
        }
    }

    public function view($id)
    {
        $insuranceCompany = InsuranceCompany::find($id);
        return view('admins_side.super_admin.dashboard.insurance_company.view', ['insuranceCompany' => $insuranceCompany]);
    }
    public function updateView($id)
    {
        $insuranceCompany = InsuranceCompany::find($id);
        return view('admins_side.super_admin.dashboard.insurance_company.update', ['insuranceCompany' => $insuranceCompany]);
    }


    public function update($id,Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);

        $insuranceCompany = InsuranceCompany::find($id);
        $insuranceCompany->name = $request->name;

        if ($insuranceCompany->save()) {
            if ($request->file('company_logo')) {
                $licenseImageFile=$request->file('company_logo');
                $insuranceCompanyLogos = new InsuranceCompanyLogos;
                $path = $licenseImageFile->store('/images/resource', ['disk' =>   'images']);
                $insuranceCompanyLogos->logo_url = $path;
                $insuranceCompanyLogos->insurance_company_id = $insuranceCompany->id;
                $insuranceCompanyLogos->save();
            }

            return redirect()->route('super-admin.dashboard.insurance-company-view', ['id' => $insuranceCompany->id]);  
        }
    }

    public function delete(Request $request)
    {

        InsuranceCompany::where('id', $request->id)->delete();
        return true;
    }

    public function deleteImage(Request $request)
    {

        InsuranceCompanyLogos::where('id', $request->id)->delete();
        return true;
    }


    
}