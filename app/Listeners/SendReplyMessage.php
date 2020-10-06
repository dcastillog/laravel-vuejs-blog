<?php

namespace App\Listeners;

use App\Events\MessageProcessed;
use App\Mail\ReplyMessage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;

class SendReplyMessage
{
    /**
     * Handle the event.
     *
     * @param  MessageProcessed  $event
     * @return void
     */
    public function handle(MessageProcessed $event)
    {   
        Mail::to($event->data)->queue(
            new ReplyMessage($event->data, $event->repplyMessage)
        );
    }
}
