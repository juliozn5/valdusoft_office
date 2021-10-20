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
        'payroll_employee_id',
        'amount',
        'date',
        'description',
    ];

    public function financing(){
        return $this->belongsTo('App\Models\Financing');
    }

    public function payroll_employee(){
        return $this->belongsTo('App\Models\PayrollEmployee', 'payroll_employee_id', 'id');
    }
}
