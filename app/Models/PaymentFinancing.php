<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancingPayment extends Model
{
    use HasFactory;

    protected $table = 'financing_payments';

    protected $fillable =[
        'financing_id',
        'amount',
        'date',
    ];

    public function financing(){
        return $this->belongsTo('App\Models\Financing');
    }
}
