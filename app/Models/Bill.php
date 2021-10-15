<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bill extends Model{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'hosting_id',
        'project_id',
        'amount',
        'date',
        'payed_at',
        'status',
        'payment_type',
        'billetera',
        'bancolombia',
        'comprobante'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function hosting(){
        return $this->belongsTo('App\Models\Hosting');
    }

    public function project(){
        return $this->belongsTo('App\Models\Project');
    }
}
