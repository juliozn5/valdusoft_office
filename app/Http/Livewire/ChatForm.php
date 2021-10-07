<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Chat;
use App\Events\NuevoMensaje;
use Auth;

class ChatForm extends Component
{
     // Estas propiedades son publicas
    // y se pueden utilizar directamente desde la vista
    public $project;
    public $user;
    public $user_id;
    public $message;

    // Eventos Recibidos
    protected $listeners = ['solicitaUsuario'];

    protected $rules = [
        'message' => 'required',
    ];

    protected $messages = [
        'message.required' => 'Debe escribir un mensaje',
    ];

    protected $validationAttributes = [
        'message' => 'mensaje'
    ];

    // Cuando se Inicia el Componente (antes de Render)
    public function mount()
    {                
        // Instanciamos Faker
        //$this->faker = \Faker\Factory::create();  
        $this->user = Auth::user()->name." ".Auth::user()->last_name;     
        $this->user_id = Auth::user()->id;       
    }
    
    // Cuando el otro componente nos solicitan el usuario    
    public function solicitaUsuario()
    {
        // Lo emitimos por evento
        $this->emit('cambioUsuario', $this->user);
    }

    // Cuando actualizamos el nombre de usuario
    public function updatedUsuario()
    {
        // Notificamos al otro componente el cambio
        $this->emit('cambioUsuario', $this->user);
    }

    // Se produce cuando se actualiza cualquier dato por Binding
    public function updated($message)
    {
        $this->validateOnly($message);
    }

    public function enviarMensaje()
    {                
        $validatedData = $this->validate();

        // Guardamos el mensaje en la BBDD
        Chat::create([
            "user_id" => $this->user_id,
            "project_id" => $this->project,
            "message" => $this->message
        ]);
        
        // Generamos el evento para Pusher
        // Enviamos en la "push" el usuario y mensaje (aunque en este ejemplo no lo utilizamos)
        // pero nos vale para comprobar en PusherDebug (y por consola) lo que llega...
        event(new NuevoMensaje($this->project, $this->user, $this->message));
        
        // Este evento es para que lo reciba el componente
        // por Javascript y muestre el ALERT BOOSTRAP de "enviado"
        $this->emit('enviadoOK', $this->message);
    }    

    public function render()
    {
        return view('livewire.chat-form');
    }
}
