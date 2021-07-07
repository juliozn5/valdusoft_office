<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Hosting extends Model
{
    use HasFactory;

      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'url',
        'create_date',
        'due_date',
        'updated_at',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    
}
