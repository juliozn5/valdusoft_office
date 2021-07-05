<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Financing extends Model
{
    use HasFactory;

    protected $table = 'financing';

    protected $fillable =[
        'user_id',
        'total_amount',
        'status',
        'date',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function payments(){
        return $this->hasMany('App\Models\PaymentFinancing');
    }
}
