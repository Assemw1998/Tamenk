<?php

namespace App\Http\Controllers\admins_side\super_admin\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CarMake;


class CarMakeController extends Controller
{
    public function index()
    {
        $carMakes= CarMake::all();
        return view('admins_side.super_admin.dashboard.car_make.index', ['carMakes' => $carMakes]);
    }

    public function createView()
    {
        return view('admins_side.super_admin.dashboard.car_make.create');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);

        $carMake = new CarMake;
        $carMake->name = $request->name;
  

        if ($carMake->save()) {
            return redirect()->route('super-admin.dashboard.car-make-view', ['id' => $carMake->id]);
        }
    }

    public function view($id)
    {
        $carMake = CarMake::find($id);
        return view('admins_side.super_admin.dashboard.car_make.view', ['carMake' => $carMake]);
    }
    public function updateView($id)
    {
        $carMake = CarMake::find($id);
        return view('admins_side.super_admin.dashboard.car_make.update', ['carMake' => $carMake]);
    }


    public function update($id,Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);

        $carMake = CarMake::find($id);
        $carMake->name = $request->name;

        if ($carMake->save()) {
            return redirect()->route('super-admin.dashboard.car-make-view', ['id' => $carMake->id]);  
        }
    }

    public function delete(Request $request)
    {

        CarMake::where('id', $request->id)->delete();
        return true;
    }


    
}