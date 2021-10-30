<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payrolls extends Model
{
    use HasFactory;

    protected $table = 'payrolls';

    protected $fillable =[
        'id',
        'amount',
        'status',
        'start_date',
        'dead_line',
        
    ];
    
    public function payrolls_employee(){
        return $this->hasMany('App\Models\PayrollEmployee', 'payroll_id', 'id');
    }

}
