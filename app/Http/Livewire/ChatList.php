<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Chat;

class ChatList extends Component
{
    public $project;
    public $user;
    public $user_id;
    public $messages;
    protected $lastId;
        
    protected $listeners = ['mensajeRecibido'];
    
    public function mount()
    {
        $this->lastId = 0;
        $this->messages = [];         
        
        $messages = Chat::where('project_id', '=', $this->project)
                        ->orderBy("id", "ASC")
                        ->get();          
        
        foreach($messages as $message){
            $this->lastId = $message->id;
            
            $item = [
                    "id" => $message->id,
                    "usuario_id" => $message->user_id,
                    "usuario" => $message->user->name." ".$message->user->last_name,
                    "mensaje" => $message->message, 
                    "fecha" => $message->created_at->diffForHumans()
                ];
                
                array_push($this->messages, $item);      
            
        }
        
        //$this->usuario = request()->query('usuario', $this->usuario) ?? "";                
    }

    public function mensajeRecibido($data)
    {        
        $this->actualizarMensajes($data);
    }

    /*public function cambioUsuario($user)
    {
        $this->user = $user;
    }*/

    public function actualizarMensajes($data){                
        // El contenido de la Push
        //$data = \json_decode(\json_encode($data));
            
        $message = Chat::where('project_id', '=', $this->project)
                        ->orderBy("id", "DESC")
                        ->first();          

        if (!is_null($message)){
            $item = [
                "id" => $message->id,
                "usuario_id" => $message->user_id,
                "usuario" => $message->user->name." ".$message->user->last_name,
                "mensaje" => $message->message,
                "fecha" => $message->created_at->diffForHumans()
            ];
                
            array_push($this->messages, $item);
             
        }
    }

    public function resetMensajes(){
       // $this->messages = [];
        $this->actualizarMensajes();
    }

    public function dydrate()
    {
        if($this->user == "")
        {
            // Le pedimos el uisuario al otro componente
            $this->emit('solicitaUsuario');
        }
    }

    public function render()
    {
        return view('livewire.chat-list');
    }
}
