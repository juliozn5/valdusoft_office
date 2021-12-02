<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NuevoMensaje implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $proyecto;
    public $usuario;
    public $mensaje;
    public $id_usuario;

    public function __construct($proyecto, $usuario, $mensaje, $id_usuario)
    {
        $this->proyecto = $proyecto;
        $this->usuario = $usuario;
        $this->mensaje = $mensaje;
        $this->id_usuario = $id_usuario;
    }
    
    public function broadcastOn()
    {
        return ["my-channel"];
    }

    public function broadcastAs()
    {
        return "my-event";
    }
}
