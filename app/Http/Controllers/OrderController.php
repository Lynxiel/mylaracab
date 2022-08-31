<?php

namespace App\Http\Controllers;

use App\Models\Cable;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{
    public function createOrder(Request $request){


        $email = $request->order_contact;
        $order = new Order();
        if  (!isset(auth()->user()->id)){
            $user_id = User::getUserIdByEmail($email);
            if (!$user_id) {
                $user_id = new User();
                $user_id->addNewUser($email);
            }
        }else $user_id = auth()->user()->id;

        $order->setUserID($user_id)->AddOrder();
        $cables = CartController::init($request);
        $order->AddCablesToOrder($cables);
        MailController::orderSend($request);
        session()->remove('cable_id');
        return redirect()->intended('/');
    }

    public function cancelOrder(int $order_id){

        $order = new Order();
        $order->cancelOrder($order_id);
        session()->flash('success', 'OrderCanceled');
        return redirect()->intended('/account');
    }


}

