<?php

namespace App\Http\Controllers;

use App\Mail\AccountRegister;
use App\Mail\ContactUs;
use App\Mail\ExchangeError;
use App\Mail\OrderCreated;
use App\Mail\OrderConfirmed;
use App\Mail\OrderPayed;
use App\Mail\OrderFinished;
use App\Mail\OrderCanceled;
use App\Mail\OrderReceived;
use App\Mail\PasswordChanged;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Order;
use App\Models\User;


class MailController extends Controller
{
    public static function orderSend(Request $request,Order $order){
        Mail::to($request->user()?$request->user():$request->order_contact)->send(new OrderCreated($order));
    }

    public static function passwordChanged(User $user ,string $password){
        Mail::to($user->email)->send(new PasswordChanged($user, $password));
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

    public static function orderReceived(Order $order,   $user){
        Mail::to("postmaster@kabelopt71.ru")->send(new OrderReceived($order, $user));
    }

    public static function ExchangeError($msg){
        Mail::to("postmaster@kabelopt71.ru")->send(new ExchangeError($msg));
    }

    public static function ContactUs($email ,$msg){
        Mail::to("tricolor-nsk@mail.ru")->send(new ContactUs($email, $msg));
    }
}
