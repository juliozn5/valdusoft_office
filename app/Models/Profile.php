<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'profile'
    ];

    // relacion de rol para cada usuario
    public function users(){
        
        return $this->hasMany('App\Models\User');

    }
}