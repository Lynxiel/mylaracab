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
    public function index(int $status=null){

        $orders = Order::with('user')->with('cables.cable')
            ->orderByDesc('created_at');

        if ($status!==null){ $orders->where('status' , '=', $status);   }
        $orders = $orders->paginate(20);
        return view('admin.index', compact('orders'));
    }

    public function cancel(Request $request){

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
        session()->flash('OrderCanceled');
        return Redirect::back();
    }



    public function update(Request $request){

        // TODO: Validation
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
