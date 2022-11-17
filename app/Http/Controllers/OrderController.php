<?php

namespace App\Http\Controllers;

use App\Models\CableOrder;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use TCG\Voyager\Models\Role;


class OrderController extends Controller
{
    public function create(Request $request){

        $validated = $request->validate([
            'order_contact' => 'regex:/[0-9]+/',
        ]);

        $cables = session()->get('cart');
        $user = auth()->user();
        $order= (new Order)->create([
                'user_id' => $user?$user->id:$user,
                'status' => Order::CREATED,
                'comment' => isset($validated['order_contact'])?$validated['order_contact']:'',
            ]);

        $order->cables()->attach($cables);

        MailController::orderReceived($order,$user);
        session()->remove('cart');
        session()->flash('OrderSend');
        if ($user) {
            MailController::orderSend($request,$order);
            return redirect()->route('account.show');
        }
        return redirect()->back();
    }


    public function cancel(Request $request){

        //TODO validate
        $data = $request->only(['order_id','cancel_comment']);

        $order = Order::findOrFail($data['order_id']);
        $user = User::find($order->user_id);
                                                     // not cool - temp
        if (auth()->user()->id != $order->user_id && auth()->user()->role_id!=1 ){ abort('404');}

        $order->update([
            'status'=>Order::CANCELED,
            'comment'=>$data['cancel_comment'] ]);

        // Send notification to admin
        MailController::orderCanceled($order,$user);
        session()->flash('OrderCanceled');
        return Redirect::back();
    }


}

