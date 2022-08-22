<?php

namespace App\Http\Controllers;

use App\Mail\OrderConfirm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class MailController extends Controller
{
    public static function orderSend(Request $request){
        Mail::to($request->user())->send(new OrderConfirm());
        session()->flash('success', 'Заказ успешно отправлен на почту');
        return redirect()->intended('/');
    }
}
