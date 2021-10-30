<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    use HasFactory;

    protected $table = 'bills_details';

    protected $fillable = [
        'bill_id',
        'description',
        'units',
        'price',
    ];

    public function bill(){
        return $this->belongsTo('App\Models\Bill');
    }
}
