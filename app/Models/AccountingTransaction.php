<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountingTransaction extends Model
{
    use HasFactory;

    protected $table = 'project_accounting_transactions';

    protected $fillable = [
        'project_id',
        'description',
        'type',
        'amount',
        'date',
        'status'
    ];

    public function project(){
        return $this->belongsTo('App\Models\Project');
    }
}
