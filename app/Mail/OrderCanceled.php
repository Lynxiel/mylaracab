<?php

namespace App\Mail;

//use http\Env\Request;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Http\Controllers\CartController;
use App\Models\Order;

class OrderCanceled extends Mailable
{
    use Queueable, SerializesModels;

    public Order $order;
    public ?User $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order, ?User $user)
    {
       $this->order = $order;
       $this->user = $user;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Заказ отменен')->view('mails.ordercanceled')->with(['order'=>$this->order ,'user'=>$this->user] );
    }
}
