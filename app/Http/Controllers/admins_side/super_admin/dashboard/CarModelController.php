<?php

namespace App\Http\Controllers\admins_side\super_admin\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CarModel;
use App\Models\CarMake;

class CarModelController extends Controller
{
    public function index()
    {
        $carModels = CarModel::all();
        return view('admins_side.super_admin.dashboard.car_model.index', ['carModels' => $carModels]);
    }
    public function createView()
    {
        $carMakes = CarMake::all();
        return view('admins_side.super_admin.dashboard.car_model.create',['carMakes' => $carMakes]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);
        $carModel = new CarModel;
        $carModel->name = $request->name;
        $carModel->make_id = $request->make_id;
  

        if ($carModel->save()) {
            return redirect()->route('super-admin.dashboard.car-model-view', ['id' => $carModel->id]);
        }
    }

    public function view($id)
    {
        $carModel = CarModel::find($id);
        return view('admins_side.super_admin.dashboard.car_model.view', ['carModel' => $carModel]);
    }
    public function updateView($id)
    {
        $carModel = CarModel::find($id);
        $carMakes = CarMake::all();
        return view('admins_side.super_admin.dashboard.car_model.update', ['carModel' => $carModel, 'carMakes' => $carMakes]);
    }


    public function update($id,Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);

        $carModel = CarModel::find($id);
        $carModel->name = $request->name;
        $carModel->make_id = $request->make_id;

        if ($carModel->save()) {
            return redirect()->route('super-admin.dashboard.car-model-view', ['id' => $carModel->id]);  
        }
    }

    public function delete(Request $request)
    {

        CarModel::where('id', $request->id)->delete();
        return true;
    }


    
}
