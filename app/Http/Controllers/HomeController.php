<?php

namespace App\Http\Controllers;

use App\Models\Cable;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class HomeController extends Controller
{
    public function index(Request $request)
    {

        $groups = Group::with('cables')->get();
        $cart = CartController::get();
        return view('home',compact('groups','cart'));
    }

    public function delivery(Request $request)
    {
        $cart = CartController::get();
        return view('delivery',compact( 'cart'));
    }

    public function about_us(Request $request)
    {
        $cart = CartController::get();
        return view('about_us',compact( 'cart'));
    }

    public function agreement(Request $request)
    {
        $cart = CartController::get();
        return view('agreement',compact( 'cart'));
    }

    public function politics(Request $request)
    {
        $cart = CartController::get();
        return view('politics',compact( 'cart'));
    }
}
