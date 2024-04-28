<?php

namespace App\Http\Controllers\client_side;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BackgroundImage;

class HomeController extends Controller
{
    public function index()
    {
        $backgroundImages=  BackgroundImage::all();
        return view('client_side.pages.index',  ['backgroundImages' => $backgroundImages]);
    }
}
