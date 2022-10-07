<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;

class OrderController extends Controller
{
    //
    public function index(?int $status=null){
        if ($status===null)  $orders= Order::GetUserOrders();
        else  $orders= Order::GetUserOrders(null, [$status] );
        return view('admin.index', compact('orders'));
    }


    public function show(){

        $orders= Order::GetUserOrders(null);
        return  view('admin.orders', compact('orders'));
    }

    public function updateOrder(Request $request){
        $data = $request->all();
        $order = Order::find($data['order_id']);
        $user = User::find($order->user_id);
        $order->comment = $data['comment'];
        $order->address = $data['address'];
        $order->pay_link = $data['pay_link'];
        if (isset($data['status']) && $data['status'])        {
            $order->status = $data['status'];
            if ($order->user_id)
            switch ($order->status) {
                case 1:
                    MailController::OrderConfirmed($user['email'], $order);
                    break;
                case 2:
                    MailController::OrderPayed($user['email'], $order);
                    break;
                case 3:
                    MailController::OrderFinished($user['email'], $order);
                    break;
            }
        }
        $order->save();
    }
}
