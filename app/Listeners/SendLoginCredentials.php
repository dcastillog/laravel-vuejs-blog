<?php

namespace App\Listeners;

use App\Events\UserWasCreated;
use App\Mail\LoginCredentials;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;

class SendLoginCredentials
{

    /**
     * Handle the event.
     *
     * @param  UserWasCreated  $event
     * @return void
     */
    public function handle(UserWasCreated $event)
    {
        // Recibe como parámetro el evento
        
        // Realizamos la acción en respuesta a este evento, el handle(), Enviar el email con las credenciales del login
        Mail::to($event->user)->queue(
            new LoginCredentials($event->user, $event->password) // Creamos el email con make:mail LoginCredentials -m emails.login-credentials
        );


    }
}
