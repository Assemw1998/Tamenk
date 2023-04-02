<?php

namespace App\Http\Controllers\admins_side\common\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\CarMake;
use App\Models\Color;
use App\Models\Country;
use App\Models\CarModel;
use App\Models\InsuranceCompany;
use App\Models\Quotation;

class QuotationController extends Controller
{
    public function index()
    {
        $quotations = Quotation::all();
        return view('admins_side.common.dashboard.quotation.index', ['quotations' => $quotations]);
    }

    public function createView()
    {
        $customers = Customer::all();
        $insuranceCompanies = InsuranceCompany::all();
        return view('admins_side.common.dashboard.quotation.create', ['customers' => $customers,'insuranceCompanies'=>$insuranceCompanies]);
    }


    public function create(Request $request)
    {
        $quotation = new Quotation;
        $quotation->customer_id = $request->customer_id;
        $quotation->insurance_company_id = $request->insurance_company_id;
        $quotation->insurance_type = $request->insurance_type;
        $quotation->personal_accident_benefits_for_driver = $request->personal_accident_benefits_for_driver;
        $quotation->personal_accident_benefits_for_passenger = $request->personal_accident_benefits_for_passenger;
        $quotation->road_side_assistance_services = $request->road_side_assistance_services;
        $quotation->rent_a_car = $request->rent_a_car;
        $quotation->extra_information_inputs = $request->extra_information_inputs;
        $quotation->price = $request->price;
        $quotation->vat = $request->vat;
        $quotation->total = $request->total;
        $quotation->car_value = $request->car_value;
        if ($quotation->save()) {
           return redirect()->route('super-admin.dashboard.quotation-view', ['id' => $quotation->id]);
        }
    }

    public function view($id)
    {
        $quotation = Quotation::find($id);
        return view('admins_side.common.dashboard.quotation.view', ['quotation' => $quotation]);
    }
    public function updateView($id)
    {
        $quotation = quotation::find($id);
        $customers= Customer::all();
        $insuranceCompanies = InsuranceCompany::all();
        return view('admins_side.common.dashboard.quotation.update', ['quotation' => $quotation,'customers'=>$customers,'insuranceCompanies'=>$insuranceCompanies]);
    }


    public function update($id, Request $request)
    {
        $quotation = Quotation::find($id);
        $quotation->customer_id = $request->customer_id;
        $quotation->insurance_company_id = $request->insurance_company_id;
        $quotation->insurance_type = $request->insurance_type;
        $quotation->personal_accident_benefits_for_driver = $request->personal_accident_benefits_for_driver;
        $quotation->personal_accident_benefits_for_passenger = $request->personal_accident_benefits_for_passenger;
        $quotation->road_side_assistance_services = $request->road_side_assistance_services;
        $quotation->rent_a_car = $request->rent_a_car;
        $quotation->extra_information_inputs = $request->extra_information_inputs;
        $quotation->price = $request->price;
        $quotation->vat = $request->vat;
        $quotation->total = $request->total;
        $quotation->car_value = $request->car_value;
        if ($quotation->save()) {
           return redirect()->route('super-admin.dashboard.quotation-view', ['id' => $quotation->id]);
        }
    }

    public function delete(Request $request)
    {

        Quotation::where('id', $request->id)->delete();
        return true;
    }
}
