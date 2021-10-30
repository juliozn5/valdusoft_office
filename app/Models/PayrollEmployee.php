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
    ];

    public function payroll(){
        return $this->belongsTo('App\Models\Payrolls', 'payroll_id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User','user_id', 'id');
    }

    public function bond(){
        return $this->hasOne('App\Models\Bond', 'payroll_employee_id');
    }

    public function financing(){
        return $this->hasOne('App\Models\Financing', 'payroll_employee_id');
    }

    public function financing_payment(){
        return $this->hasOne('App\Models\FinancingPayment', 'payroll_employee_id');
    }

    public function bill(){
        return $this->hasOne('App\Models\PayrollEmployee', 'payroll_employee_id');
    }
}
