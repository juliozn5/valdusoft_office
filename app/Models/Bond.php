<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bond extends Model
{
    use HasFactory;

    protected $table = 'bonds';

    protected $fillable =[
        'user_id',
        'payroll_employee_id',
        'amount',
        'description',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User','user_id', 'id');
    }

    public function payroll_employee(){
        return $this->belongsTo('App\Models\PayrollEmployee','payroll_employee_id', 'id');
    }
}
