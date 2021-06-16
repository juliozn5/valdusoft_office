<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = [
        'skill'
    ];

    // relacion de habilidades para cada empleado
    public function users(){

        return $this->belongsToMany('App\Models\User', 'skills_users', 'skill_id', 'user_id');

    }
}