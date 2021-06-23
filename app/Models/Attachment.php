<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attachment extends Model{
    use HasFactory;

    protected $table = 'project_attachments';
    
    protected $fillable = [
        'project_id',
        'name',
        'file_name',
        'file_type'
    ];

    public function project(){
        return $this->belongsTo('App\Models\Project');
    }
}
