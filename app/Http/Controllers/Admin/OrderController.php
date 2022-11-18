<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\OrderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(string $status = Order::CREATED)
    {
        $orders = Order::with('user')
            //->where('status', '=' , $status)
            ->orderByDesc('created_at');

        $orders = $orders->paginate(20);
        return view('admin.orders',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::with('cables')->with('user')->findOrFail($id);
        return view('admin.order.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $request, $id)
    {
        $validated = $request->validated();
        $order = Order::with('user')->findOrFail($id);
        $order->update($validated);
        if (isset($validated['status']) && $validated['status'])        {
                if ($order->user_id)
                switch ($validated['status']) {
                    case 1:
                        MailController::OrderConfirmed($order->user->email, $order);
                        break;
                    case 2:
                        MailController::OrderPayed($order->user->email, $order);
                        break;
                    case 3:
                        MailController::OrderFinished($order->user->email, $order);
                        break;
                }
        }

        session()->flash('orderEdited',true);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::findOrFail($id)->delete();
        session()->flash('orderDeleted',true);
        return redirect()->back();
    }
}
