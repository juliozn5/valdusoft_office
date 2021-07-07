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
        'date',
        
    ];
    
    public function employees(){
        return $this->hasMany('App\Models\PayrollEmployee');
    }

}
