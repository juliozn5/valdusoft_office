<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payrolls extends Model
{
    use HasFactory;

    protected $fillable =[

        'id',
        'amount',
        'status',
        'date',
    ];
    public function user(){
        return
        $this->belongsTo('App/Models/User');
    }

}
