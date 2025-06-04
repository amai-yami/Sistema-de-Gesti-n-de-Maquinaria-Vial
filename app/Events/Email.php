<?php

namespace App\Events;

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Email
{
    use Dispatchable, SerializesModels;

    public $email;
    public $mensaje;

    public function __construct($email, $mensaje)
    {
        $this->email = $email;
        $this->mensaje = $mensaje;
    }
}
