<?php

namespace App\Mail;

//use http\Env\Request;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Http\Controllers\CartController;

class OrderCreated extends Mailable
{
    use Queueable, SerializesModels;
    protected Order $order;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
        $cart = CartController::init($request);
        return $this->subject('Заказ Kabelopt71.ru')->view('mails.created')->with('order', $this->order);
    }
}
