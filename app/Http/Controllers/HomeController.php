<?php

namespace App\Http\Controllers;

use App\Models\Cable;
use App\Models\CableGroup;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {

        $groups = CableGroup::with('cables')->get();
        //Cart
        $cart=CartController::init($request);


        return view('home',compact('groups','cart'));
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
