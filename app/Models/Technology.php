<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Technology extends Model{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    //Relación de los proyectos con las tecnologías
    public function projects(){
        return $this->belongsToMany('App\Models\Project', 'projects_technologies', 'technology_id', 'project_id');
    }
}
