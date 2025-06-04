<?php

namespace App\Listeners;

use App\Events\Email;
use Illuminate\Support\Facades\Mail;

class SendEmailNotification
{
    public function handle(Email $event)
    {
        Mail::raw($event->mensaje, function ($message) use ($event) {
            $message->to($event->email)
                    ->subject('saludos desde el proyecto sistemavial');
        });
    }
}
