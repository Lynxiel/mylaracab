<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Requests\InvoiceRequest;
use App;
use App\Models\Order;

class InvoiceController extends Controller
{

    //
    public function formInvoice(int $order_id, InvoiceRequest $request){

        $user_id = auth()->user()->id;
        if (!Order::isUserOrder($order_id,$user_id)){
            return response()->json([
            'message' => 'Заказ не найден'
        ], 404); }

        $order = Order::GetOrder($order_id);
        if (!isset($order['0'])){
            return response()->json([
            'message' => 'Заказ не найден'
        ], 404); }

        $pdf = App::make('dompdf.wrapper');
        $order_data = App\Models\Order::getOrderContents($order_id);
        $user = App\Models\User::GetUser($user_id);

        $pdf->loadHTML(view('docs.invoice', ['order_id'=>$order_id,
            'order'=>$order,
            'order_data'=>$order_data,
            'user'=>$user]
        ));
        return $pdf->stream();
    }

    public function formQr(int $order_id){


    }

    public function notFoundInvoice():string{

    }
}
