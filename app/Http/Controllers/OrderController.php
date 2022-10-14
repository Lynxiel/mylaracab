<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class OrderController extends Controller
{
    public function createOrder(Request $request){

        $user_id = (isset(auth()->user()->id))?auth()->user()->id:null;
        $user = User::find($user_id);

        $order= Order::create(
            [
                'user_id' => $user_id,
                'status' => Order::CREATED,
            ]
        );

        $cables = CartController::init($request);
        Order::AddCablesToOrder($cables , $order->order_id);

        if ($user_id) MailController::orderSend($request,$order);
        MailController::orderReceived($order,$user);
        session()->remove('cable_id');
        session()->flash('success', 'OrderSend');
        if ($user_id) return redirect()->intended('/account');
            return redirect()->intended('/');
    }

    public function cancelOrder(Request $request){

        //TODO validate
        $data = $request->only(['order_id','cancel_comment']);

        $order = Order::findOrFail($data['order_id']);
        $user = User::find($order->user_id);

        if (auth()->user()->id != $order->user_id){ abort('404');}

        $order->update([
            'status'=>Order::CANCELED,
            'comment'=>$data['cancel_comment'] ]);

        // Send notification to admin
        MailController::orderCanceled($order,$user);
        session()->flash('success', 'OrderCanceled');
        return Redirect::back();
    }


}

