<?php

namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;


class PasswordChanged extends Mailable
{
    use Queueable, SerializesModels;
    protected User $user;
    protected string $password;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( User $user, string $password ){
        $this->user = $user;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(){
        return $this->subject('Cмена пароля Kabelopt-71.ru')->view('mails.passwordchanged')
            ->with(['user'=>$this->user] )->with(['password'=>$this->password] );
    }
}
