<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App;

class InvoiceController extends Controller
{
    //
    public function index(int $order_id){

        $pdf = App::make('dompdf.wrapper');
        $order = App\Models\Order::GetOrder($order_id);
        $order_data = App\Models\Order::getOrderContents($order_id);

        $pdf->loadHTML(view('docs.invoice', ['order_id'=>$order_id,'order'=>$order, 'order_data'=>$order_data] ));
        return $pdf->stream();
    }

    public function formQr(int $order_id){


    }
}
