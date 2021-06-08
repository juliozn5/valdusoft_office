<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'start_date',
    ];

    //Relación de los proyectos asignados a los empleados
    public function employes(){
        return $this->belongsToMany('App\Models\User', 'projects_users', 'project_id', 'user_id');
    }
}
