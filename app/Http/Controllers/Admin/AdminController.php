<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with(['user', 'cables'])
            ->orderByDesc('created_at')
            ->orderBy('status');
        $orders = $orders->limit(10)->get();


        return view('admin.index' , compact('orders'));
    }


}
