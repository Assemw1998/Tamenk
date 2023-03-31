<?php

namespace App\Http\Controllers\admins_side\super_admin\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\City;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::all();
        return view('admins_side.super_admin.dashboard.city.index', ['cities' => $cities]);
    }
    public function createView()
    {
        $countries = Country::all();
        return view('admins_side.super_admin.dashboard.city.create',['countries' => $countries]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);
        $city = new City;
        $city->name = $request->name;
        $city->country_id = $request->country_id;
  

        if ($city->save()) {
            return redirect()->route('super-admin.dashboard.city-view', ['id' => $city->id]);
        }
    }

    public function view($id)
    {
        $city = City::find($id);
        return view('admins_side.super_admin.dashboard.city.view', ['city' => $city]);
    }
    public function updateView($id)
    {
        $city = City::find($id);
        $countries = Country::all();
        return view('admins_side.super_admin.dashboard.city.update', ['city' => $city, 'countries' => $countries]);
    }


    public function update($id,Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);

        $city = City::find($id);
        $city->name = $request->name;
        $city->country_id = $request->country_id;

        if ($city->save()) {
            return redirect()->route('super-admin.dashboard.city-view', ['id' => $city->id]);  
        }
    }

    public function delete(Request $request)
    {

        City::where('id', $request->id)->delete();
        return true;
    }


    
}
