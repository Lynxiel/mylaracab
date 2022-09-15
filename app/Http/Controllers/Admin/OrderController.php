<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    //
    public function index(Request $request){

        $data = $request->all();

        $orders= Order::GetUserOrders(null);
        return view('admin.orders', compact('orders'));
    }

    public function updateOrder(Request $request){
        $data = $request->all();
        $order = Order::find($data['order_id']);
        $order->comment = $data['comment'];
        $order->address = $data['address'];
        if (isset($data['status']))$order->status = $data['status'];
        $order->save();

        return Redirect::back();
    }
}
