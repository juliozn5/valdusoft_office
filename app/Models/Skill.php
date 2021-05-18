<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = [
        'skill'
    ];

    public function users(){
        return $this->belongsToMany('App\Models\User', 'skills_users', 'skill_id', 'user_id');
    }
}