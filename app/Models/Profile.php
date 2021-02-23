<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $table = "profiles";

    protected $fillable = ['profile'];

    public function users(){
        return $this->hasMany('App\Models\User');
    }
}
