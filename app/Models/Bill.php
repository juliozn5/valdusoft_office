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
        'payroll_employee_id',
        'amount',
        'date',
        'payed_at',
        'status',
        'type',
        'tipo_pago',
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

    public function payroll_employee(){
        return $this->belongsTo('App\Models\PayrollEmployee');
    }

    public function details(){
        return $this->hasMany('App\Models\BillDetail');
    }

    public function payments(){
        return $this->hasMany('App\Models\Payments');
    }

    public function payroll(){
        return $this->belongsTo('App\Models\Payrolls', 'id');
    }
}
