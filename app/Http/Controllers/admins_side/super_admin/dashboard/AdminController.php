<?php

namespace App\Http\Controllers\admins_side\super_admin\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use IlluminateSupportFacadesAuth;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        return view('admins_side.super_admin.dashboard.admin.index', ['admins' => $admins]);
    } 

    public function createView()
    {
        return view('admins_side.super_admin.dashboard.admin.create');
    } 

    public function create(Request $request)
    {
        $this->validate($request, [
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|string|between:1,10|unique:admins',
            'email' => 'required|email|unique:admins',
            'username' => 'required|unique:admins',
        ]);

        $admin = new Admin;
        $admin->full_name = $request->full_name;
        $admin->email = $request->email;
        $admin->phone_number = $request->phone_number;
        $admin->username = $request->username;
        $admin->password = $request->password;
        $admin->save();
            
        return redirect()->route('super-admin.dashboard.admin-view', ['id' => $admin->id]);
    }

    public function updateView($id)
    {
        $admin = Admin::find($id);
        return view('admins_side.super_admin.dashboard.admin.update', ['admin' => $admin]);
    }

    public function update($id, Request $request)
    {

        $this->validate($request, [
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|string|between:1,10|unique:admins,phone_number,'.$id,
            'email' => 'required|email|unique:admins,email,'.$id,
            'username' => 'required|unique:admins,username,'.$id,
        ]);

        $admin = Admin::find($id);
        $admin->full_name = $request->full_name;
        $admin->phone_number = $request->phone_number;
        $admin->email = $request->email;
        $admin->username = $request->username;
        if ($request->password){
            $admin->password = $request->password;
        }
            
        $admin->save();
           
        return redirect()->route('super-admin.dashboard.admin-view', ['id' => $admin->id]);
    }

    public function view($id)
    {
        $admin = Admin::find($id);
        return view('admins_side.super_admin.dashboard.admin.view', ['admin' => $admin]);
    }

    public function activateDeactivate(Request $request)
    {
        $ِِadmin = Admin::find($request->id);

        if ($ِِadmin->status == Admin::STATUS_ACTIVE) {
            $ِِadmin->status = Admin::STATUS_INACTIVE;
        } elseif ($ِِadmin->status == Admin::STATUS_INACTIVE) {
            $ِِadmin->status = Admin::STATUS_ACTIVE;
        }
        $ِِadmin->save();
        return true;
    }

    public function delete(Request $request)
    {
        Admin::where('id', $request->id)->delete();
        return true;
    }
    

}
