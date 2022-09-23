<?php

namespace App\Http\Controllers;

use App\Models\Cable;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Redirect;


class OrderController extends Controller
{
    public function createOrder(Request $request){

        $order = new Order();
        if ($request->order_contact){
            $order->setPhone($request->order_contact);
        }
        $user_id = isset(auth()->user()->id)?auth()->user()->id:null;
        $user = User::find($user_id);
        $order->setUserID($user_id)->AddOrder();
        $cables = CartController::init($request);
        $order->AddCablesToOrder($cables);
        if ($user_id)MailController::orderSend($request);
        MailController::orderReceived($order,$user);
        session()->remove('cable_id');
        session()->flash('success', 'OrderSend');
        if ($user_id) return redirect()->intended('/account');
            return redirect()->intended('/');
    }

    public function cancelOrder(int $order_id){

        $order = Order::find($order_id);
        $user = User::find($order->user_id);
        $order->cancelOrder($order_id);
        // Send notification to admin
        MailController::orderCanceled($order,$user);
        session()->flash('success', 'OrderCanceled');
        return Redirect::back();
    }


}

