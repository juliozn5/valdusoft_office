<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model{
    use HasFactory;

    protected $fillable = [
        'name',
        'abbreviation'
    ];

    public function projects(){
        return $this->hasMany('App\Models\Project');
    }
}
