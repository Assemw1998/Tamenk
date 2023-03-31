<?php

namespace App\Http\Controllers\admins_side\super_admin\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Color;


class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::all();
        return view('admins_side.super_admin.dashboard.color.index', ['colors' => $colors]);
    }
    public function createView()
    {
        return view('admins_side.super_admin.dashboard.color.create');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);
        $color = new Color;
        $color->name = $request->name;
  

        if ($color->save()) {
            return redirect()->route('super-admin.dashboard.color-view', ['id' => $color->id]);
        }
    }

    public function view($id)
    {
        $color = Color::find($id);
        return view('admins_side.super_admin.dashboard.color.view', ['color' => $color]);
    }
    public function updateView($id)
    {
        $color = Color::find($id);
        return view('admins_side.super_admin.dashboard.color.update', ['color' => $color]);
    }


    public function update($id,Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);

        $color = Color::find($id);
        $color->name = $request->name;

        if ($color->save()) {
            return redirect()->route('super-admin.dashboard.color-view', ['id' => $color->id]);
        }
    }

    public function delete(Request $request)
    {

        Color::where('id', $request->id)->delete();
        return true;
    }


    
}