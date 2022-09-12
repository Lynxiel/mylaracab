<?php

namespace App\Http\Controllers;

use App\Models\Cable;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Events\Registered;


class OrderController extends Controller
{
    public function createOrder(Request $request){

        $order = new Order();
        if ($request->order_contact){
            $order->setPhone($request->order_contact);
        }
        $user_id = isset(auth()->user()->id)?:null;
        $order->setUserID($user_id)->AddOrder();
        $cables = CartController::init($request);
        $order->AddCablesToOrder($cables);
        if ($user_id)MailController::orderSend($request);
        session()->remove('cable_id');
        session()->flash('success', 'OrderSend');
        return redirect()->intended('/');
    }

    public function cancelOrder(int $order_id){

        $order = new Order();
        $order->cancelOrder($order_id);
        session()->flash('success', 'OrderCanceled');
        return redirect()->intended('/account');
    }


}

