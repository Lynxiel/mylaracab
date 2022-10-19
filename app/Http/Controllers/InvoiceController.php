<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Requests\InvoiceRequest;
use App;
use App\Models\Order;
use App\Models\User;

class InvoiceController extends Controller
{

    //
    public function formInvoice(int $order_id, InvoiceRequest $request){

        $user_id = auth()->user()->id;
        $order = Order::with('cables.cable')->where('order_id', '=',$order_id)->firstOrFail();
        $user = User::findOrFail($user_id);

        if($order->status==Order::CREATED) abort(404);
        if($order->user_id!=$user_id) abort(404);


        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML(view('docs.invoice', [
            'order'=>$order,
            'user'=>$user]
        ));
        return $pdf->stream();
    }


}
