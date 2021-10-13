<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'status',
        'start_date',
        'ending_date',
        'logo',
        'country_id',
        'type',
        'status',
        'link',
        'description',
        'visible_landing',
        'amount'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function country(){
        return $this->belongsTo('App\Models\Country');
    }

    //Relación de los proyectos asignados a los empleados
    public function employees(){
        return $this->belongsToMany('App\Models\User', 'projects_users', 'project_id', 'user_id');
    }

    //Relación de los proyectos con las tecnologías
    public function technologies(){
        return $this->belongsToMany('App\Models\Technology', 'projects_technologies', 'project_id', 'technology_id');
    }

     //Relación de los proyectos con las etiquetas
     public function tags(){
        return $this->belongsToMany('App\Models\Tag', 'projects_tags', 'project_id', 'tag_id');
    }

    //Relación de los proyectos con sus archivos adjuntos
    public function attachments(){
        return $this->hasMany('App\Models\Attachment');
    }

    //Relación de los proyectos con sus transacciones contables
    public function accounting_transactions(){
        return $this->hasMany('App\Models\AccountingTransaction');
    }

    //Relación del proyecto con el chat
    public function chats(){
        return $this->hasMany('App\Models\Chat');
    }

    //Nombre del cliente
    public function cliente(){
        $usuario = User::find($this->user_id);
        $nombreCompleto = $usuario->name . ' ' . $usuario->last_name;
        return $nombreCompleto;
    }

    //Muestra el Status del proyecto
    public function status(){
        switch ($this->status) {
            case '0':
                return 'No atendido';
                break;
            case '1':
                return 'En Proceso';
                break;
            case '2':
                return 'Testeando';
                break;
            case '3':
                return 'Completado';
                break;
            
            default:
                return 'Sin Status';
                break;
        }
    }
}