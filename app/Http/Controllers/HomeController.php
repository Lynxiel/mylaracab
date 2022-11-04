<?php

namespace App\Http\Controllers;

use App\Models\Cable;
use App\Models\CableGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

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
        $regions = Config::get('regions');
        return view('delivery',compact( 'cart', 'regions'));
    }

    public function about_us(Request $request)
    {
        //Cart
        $cart=CartController::init($request);
        return view('about_us',compact( 'cart'));
    }

    public function agreement(Request $request)
    {
        //Cart
        $cart=CartController::init($request);
        return view('agreement',compact( 'cart'));
    }

    public function politics(Request $request)
    {
        //Cart
        $cart=CartController::init($request);
        return view('politics',compact( 'cart'));
    }
}
