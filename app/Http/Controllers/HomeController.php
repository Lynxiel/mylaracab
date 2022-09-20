<?php

namespace App\Http\Controllers;

use App\Models\Cable;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        //Cables
        $cables =  Cable::getAll();
        //Cart
        $cart=CartController::init($request);


        return view('home',compact('cables', 'cart'));
    }

    public function delivery(Request $request)
    {
        //Cart
        $cart=CartController::init($request);


        return view('delivery',compact( 'cart'));
    }

    public function about_us(Request $request)
    {
        //Cart
        $cart=CartController::init($request);
        return view('about_us',compact( 'cart'));
    }
}
