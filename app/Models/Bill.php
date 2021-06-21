<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bill extends Model{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'date',
        'payed_at',
        'status',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
