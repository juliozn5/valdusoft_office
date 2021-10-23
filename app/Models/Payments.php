<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bill_id',
        'payment_method',
        'amount',
        'fee',
        'total',
        'date',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function bill(){
        return $this->belongsTo('App\Models\Bill');
    }
  
}
