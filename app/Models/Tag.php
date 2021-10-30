<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name',
    ];

    public function projects(){
        return $this->belongsToMany('App\Models\Project', 'projects_tags', 'tag_id', 'project_id');
    }
}
