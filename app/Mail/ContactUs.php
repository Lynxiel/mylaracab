<?php

namespace App\Mail;

//use http\Env\Request;
use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Http\Controllers\CartController;

class ContactUs extends Mailable
{
    use Queueable, SerializesModels;

    public string $msg;
    public string $email;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $email,string $msg)
    {
       $this->email = $email;
       $this->msg = $msg;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
        return $this->subject('Обращение через форму обратной связи Kabelopt71.ru')
            ->view('mails.contact_us')
            ->with(['email'=>$this->email, 'msg'=>$this->msg ] );
    }
}
