<?php

namespace App\Http\Controllers\admins_side\super_admin\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;


class CountryController  extends Controller
{
    public function index()
    {
        $countries= Country::all();
        return view('admins_side.super_admin.dashboard.country.index', ['countries' => $countries]);
    }

    public function createView()
    {
        return view('admins_side.super_admin.dashboard.country.create');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);

        $country = new Country;
        $country->name = $request->name;
  

        if ($country->save()) {
            return redirect()->route('super-admin.dashboard.country-view', ['id' => $country->id]);
        }
    }

    public function view($id)
    {
        $country = Country::find($id);
        return view('admins_side.super_admin.dashboard.country.view', ['country' => $country]);
    }
    public function updateView($id)
    {
        $country = Country::find($id);
        return view('admins_side.super_admin.dashboard.country.update', ['country' => $country]);
    }


    public function update($id,Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);

        $country = Country::find($id);
        $country->name = $request->name;

        if ($country->save()) {
            return redirect()->route('super-admin.dashboard.country-view', ['id' => $country->id]);  
        }
    }

    public function delete(Request $request)
    {

        Country::where('id', $request->id)->delete();
        return true;
    }


    
}