<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $table = "chat";
    
    protected $fillable = [
        "project_id", "user_id", "message"
    ];

    public function project(){
        return $this->belongsTo('App\Models\Project');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
