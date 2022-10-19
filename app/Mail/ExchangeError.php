<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ExchangeError extends Mailable
{
    use Queueable, SerializesModels;

    public string $msg;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $msg)
    {
        $this->msg = $msg;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Ошибка парсинга файла Kabelopt71.ru')
                    ->view('mails.exchangeerror')
                    ->with(['msg'=>$this->msg ] );
    }
}
