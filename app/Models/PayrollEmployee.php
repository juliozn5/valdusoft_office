<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayrollEmployee extends Model
{
    use HasFactory;

    protected $table = 'payrolls_employee';

    protected $fillable =[
        'payroll_id',
        'user_id',
        'price_by_hour',
        'total_hours',
        'total_amount',
        'status',
        'date',
    ];

    public function payroll(){
        return $this->belongsTo('App\Models\Payroll');
    }

    public function user(){
        return $this->belongsTo('App\Models\User','user_id', 'id');
    }
}
