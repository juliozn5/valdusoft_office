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
        'status',
        'start_date',
        'ending_date',
        'logo',
        'country_id',
        'type'
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

    //Relación de los proyectos con sus archivos adjuntos
    public function attachments(){
        return $this->hasMany('App\Models\Attachment');
    }

    //Relación de los proyectos con sus transacciones contables
    public function accounting_transactions(){
        return $this->hasMany('App\Models\AccountingTransaction');
    }
}
