<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReplyMessage extends Mailable
{
    public $data;
    public $replyMessage;

    use Queueable, SerializesModels;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $repplyMessage)
    {
        $this->data = $data;
        $this->repplyMessage = $repplyMessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.reply-message')
                    ->subject('Respuesta de ' . config('app.name'));
    }
}
