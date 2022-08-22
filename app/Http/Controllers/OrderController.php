<?php

namespace App\Http\Controllers;

use App\Models\Cable;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function createOrder(Request $request){
        $order = new Order();
        $order->AddOrder();
        $cables = CartController::init($request);
        $order->AddCablesToOrder($cables);
        MailController::orderSend($request);
        session()->remove('cable_id');
        return redirect()->intended('/');
    }
}
