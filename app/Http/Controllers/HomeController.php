<?php

namespace App\Http\Controllers;

use App\Models\Cable;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {

        // Gather data and compact
        //Cables
        $cables =  Cable::getAll();
        //Cart
        $cart=CartController::init($request);


        return view('home',compact('cables', 'cart'));
    }
}
