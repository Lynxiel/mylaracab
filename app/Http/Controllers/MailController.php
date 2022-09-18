<?php

namespace App\Http\Controllers;

use App\Mail\AccountRegister;
use App\Mail\OrderConfirm;
use App\Mail\OrderConfirmed;
use App\Mail\OrderPayed;
use App\Mail\OrderFinished;
use App\Mail\OrderCanceled;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Order;
use Illuminate\Support\Facades\App;
use App\Models\User;


class MailController extends Controller
{
    public static function orderSend(Request $request){
        Mail::to($request->user()?$request->user():$request->order_contact)->send(new OrderConfirm());
    }


    public static function accountRegister(string $email, string $password, string $phone){
        Mail::to($email)->send(new AccountRegister($email, $password, $phone));
    }

    public static function orderConfirmed(string $email, Order $order){
        Mail::to($email)->send(new OrderConfirmed($order));
    }

    public static function orderPayed(string $email, Order $order){
        Mail::to($email)->send(new OrderPayed($order));
    }
    public static function orderFinished(string $email, Order $order){
        Mail::to($email)->send(new OrderFinished($order));
    }

    public static function orderCanceled(Order $order, ?User  $user){
        Mail::to("postmaster@kabelopt71.ru")->send(new OrderCanceled($order, $user));
    }
}
