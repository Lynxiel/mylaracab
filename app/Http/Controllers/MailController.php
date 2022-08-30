<?php

namespace App\Http\Controllers;

use App\Mail\AccountRegister;
use App\Mail\OrderConfirm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class MailController extends Controller
{
    public static function orderSend(Request $request){
        Mail::to($request->user()?$request->user():$request->order_contact)->send(new OrderConfirm());
        session()->flash('success', 'OrderSend');
        return redirect()->intended('/');
    }


    public static function accountRegister(string $email, string $password){
        Mail::to($email)->send(new AccountRegister($email, $password));
        return redirect()->intended('/');
    }
}
