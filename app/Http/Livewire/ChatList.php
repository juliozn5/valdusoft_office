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
        
    protected $listeners = ['mensajeRecibido'];
    
    public function mount()
    {
        $this->messages = [];         
        
        $messages = Chat::where('project_id', '=', $this->project)
                        ->with('user:id,name,last_name')
                        ->orderBy("id", "ASC")
                        ->get();     

        for ($i = 0; $i < $messages->count(); $i++){
            if($i == 0){
                $item = [
                    "divider" => true,
                    "date" =>  date('d M Y', strtotime($messages[0]->created_at))
                ];
            }else{
                if ( date('d-m-Y', strtotime($messages[$i]->created_at)) != date('d-m-Y', strtotime($messages[$i-1]->created_at)) ){
                    $item = [
                        "divider" => true,
                        "date" =>  date('d M Y', strtotime($messages[$i]->created_at))
                    ];
                    
                    array_push($this->messages, $item);
                }

                if ( $messages[$i]->user_id == $messages[$i-1]->user_id){
                    $item = [
                        "divider" => false,
                        "previous_user" => true,
                        "id" => $messages[$i]->id,
                        "user_id" => $messages[$i]->user_id,
                        "username" => $messages[$i]->user->name." ".$messages[$i]->user->last_name,
                        "message" => $messages[$i]->message, 
                        "date" => date('d M h:i a', strtotime($messages[$i]->created_at))
                    ];
                }else{
                     $item = [
                        "divider" => false,
                        "previous_user" => false,
                        "id" => $messages[$i]->id,
                        "user_id" => $messages[$i]->user_id,
                        "username" => $messages[$i]->user->name." ".$messages[$i]->user->last_name,
                        "message" => $messages[$i]->message, 
                        "date" => date('d M h:i a', strtotime($messages[$i]->created_at))
                    ];
                }
            }
            
            array_push($this->messages, $item);      
        }               
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
            
        $messages = Chat::where('project_id', '=', $this->project)
                        ->with('user:id,name,last_name')
                        ->orderBy("id", "ASC")
                        ->get();     

        for ($i = 0; $i < $messages->count(); $i++){
            if($i == 0){
                $item = [
                    "divider" => true,
                    "date" =>  date('d M Y', strtotime($messages[0]->created_at))
                ];
            }else{
                if ( date('d-m-Y', strtotime($messages[$i]->created_at)) != date('d-m-Y', strtotime($messages[$i-1]->created_at)) ){
                    $item = [
                        "divider" => true,
                        "date" =>  date('d M Y', strtotime($messages[$i]->created_at))
                    ];
                    
                    array_push($this->messages, $item);
                }

                if ( $messages[$i]->user_id == $messages[$i-1]->user_id){
                    $item = [
                        "divider" => false,
                        "previous_user" => true,
                        "id" => $messages[$i]->id,
                        "user_id" => $messages[$i]->user_id,
                        "username" => $messages[$i]->user->name." ".$messages[$i]->user->last_name,
                        "message" => $messages[$i]->message, 
                        "date" => date('d M h:i a', strtotime($messages[$i]->created_at))
                    ];
                }else{
                     $item = [
                        "divider" => false,
                        "previous_user" => false,
                        "id" => $messages[$i]->id,
                        "user_id" => $messages[$i]->user_id,
                        "username" => $messages[$i]->user->name." ".$messages[$i]->user->last_name,
                        "message" => $messages[$i]->message, 
                        "date" => date('d M h:i a', strtotime($messages[$i]->created_at))
                    ];
                }
            }
            
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
