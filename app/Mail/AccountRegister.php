<?php

namespace App\Mail;

//use http\Env\Request;
use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Http\Controllers\CartController;

class AccountRegister extends Mailable
{
    use Queueable, SerializesModels;

    public string $email;
    public string $password;
    public string $phone;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $email, string $password, string $phone)
    {
       $this->email = $email;
       $this->password = $password;
       $this->phone = $phone;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
        return $this->view('mails.register')->with(['email'=>$this->email,'password'=>$this->password ] );
    }
}
