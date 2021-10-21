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
        'payroll_employee_id',
        'total_amount',
        'status',
        'date',
        'percentage',
        'description',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function payroll_employee(){
        return $this->belongsTo('App\Models\PayrollEmployee', 'payroll_employee_id', 'id');
    }

    public function payments(){
        return $this->hasMany('App\Models\FinancingPayment');
    }
    
    public function financing_paymnets(){
          return $this->belongsTo('App\Models\FinancingPayment', 'id');
    }
}
