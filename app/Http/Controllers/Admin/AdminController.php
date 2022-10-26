<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with('user')
            ->orderByDesc('created_at')
            ->orderBy('status');

        $orders = $orders->limit(10)->get();
        //dd($orders);
        return view('admin.index' , compact('orders'));
    }


}
