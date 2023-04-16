<?php

namespace App\Http\Controllers\admins_side\common\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\CarMake;
use App\Models\Color;
use App\Models\Country;
use App\Models\CarModel;
use App\Models\City;
use Dompdf\Dompdf; 
use Illuminate\Support\Facades\Mail;
class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();

        return view('admins_side.common.dashboard.customer.index', ['customers' => $customers]);
    }

    public function createView()
    {
        $carMakes = CarMake::all();
        $colors = Color::all();
        $countries = Country::all();
        return view('admins_side.common.dashboard.customer.create', ['carMakes' => $carMakes, 'colors' => $colors, 'countries' => $countries]);
    }

    public function getCarModels($id)
    {
        if ($id)
            return CarModel::select('id', 'name')->where('make_id', $id)->orderBy('id', 'ASC')->get();
        return false;
    }

    public function getCities($id)
    {
        if ($id)
            return City::select('id', 'name')->where('country_id', $id)->orderBy('id', 'ASC')->get();
        return false;
    }

    public function create(Request $request)
    {

        $this->validate($request, [
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|string|between:1,10|unique:customers',
            'email' => 'required|email|unique:customers',
            'year' => 'required|integer',
        ]);

        $customer = new Customer;
        $customer->full_name = $request->full_name;
        $customer->car_make_id = $request->car_make_id;
        $customer->car_model_id = $request->car_model_id;
        $customer->year = $request->year;
        $customer->color_id = $request->color_id;
        $customer->phone_number = $request->phone_number;
        $customer->email = $request->email;
        $customer->country_id = $request->country_id;
        $customer->city_id = $request->city_id;


        if ($customer->save()) {
            return redirect()->route('super-admin.dashboard.customer-view', ['id' => $customer->id]);
        }
    }

    public function view($id)
    {
        $customer = Customer::find($id);
        return view('admins_side.common.dashboard.customer.view', ['customer' => $customer]);
    }
    public function updateView($id)
    {
        $customer = Customer::find($id);
        $carMakes = CarMake::all();
        $carModels = CarModel::where('make_id', $customer->car_make_id)->orderBy('id', 'ASC')->get();
        $colors = Color::all();
        $countries = Country::all();
        $cities = City::where('country_id', $customer->country_id)->orderBy('id', 'ASC')->get();
        return view('admins_side.common.dashboard.customer.update', ['customer' => $customer, 'carMakes' => $carMakes, 'carModels' => $carModels, 'colors' => $colors, 'countries' => $countries, 'cities' => $cities]);
    }


    public function update($id, Request $request)
    {


        $this->validate($request, [
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|string|between:1,10|unique:customers,phone_number,' . $id,
            'email' => 'required|email|unique:customers,email,' . $id,
            'year' => 'required|integer',
        ]);

        $customer = Customer::find($id);
        $customer->full_name = $request->full_name;
        $customer->car_make_id = $request->car_make_id;
        $customer->car_model_id = $request->car_model_id;
        $customer->year = $request->year;
        $customer->color_id = $request->color_id;
        $customer->phone_number = $request->phone_number;
        $customer->email = $request->email;
        $customer->country_id = $request->country_id;
        $customer->city_id = $request->city_id;


        if ($customer->save()) {
            return redirect()->route('super-admin.dashboard.customer-view', ['id' => $customer->id]);
        }
    }

    public function delete(Request $request)
    {

        Customer::where('id', $request->id)->delete();
        return true;
    }

    public function quotations($id)
    {
        $customer = Customer::find($id);
        $quotations = $customer->quotations;
        return view('admins_side.common.dashboard.customer.quotations', ['customer' => $customer, 'quotations' => $quotations]);
    }

    public function quotationsCreatePdf($id)
    {
        $customer = Customer::find($id);
        $quotations = $customer->quotations;
        $dompdf = new Dompdf(); 
         
        $html = view('admins_side.common.dashboard.customer.templates.quotations_pdf', ['customer' => $customer,'quotations' => $quotations])->render();
        $dompdf->loadHtml($html);  
          
        $dompdf->setPaper('A4', 'landscape');  
          
        $dompdf->render(); 
         
        $dompdf->stream("customer_quotations_id_$customer->id.pdf", array("Attachment"=>1));
    }

    public function quotationsSendEmail(Request $request)
    {
        $customer = Customer::find($request->id);
        $quotations = $customer->quotations;
        $data = array('customer'=>$customer,'quotations'=>$quotations);
        Mail::send('admins_side.common.dashboard.customer.templates.quotations_email', $data, function($message)  use ($customer){
            $message->to($customer->email,$customer->full_name)->subject('Quotations');
            $message->from('assemwhussein@gmail.com','Tamenek');
        });  
        
        return true;       
    }
}
