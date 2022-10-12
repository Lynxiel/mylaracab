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

        $order = Order::findOrFail($order_id);

        $user_id = auth()->user()->id;
        if (!Order::isUserOrder($order_id,$user_id)){
            abort(404); }

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


}
