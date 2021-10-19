<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RenewalHosting extends Model
{
    use HasFactory;

       /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'hosting_id',
        'renewal_price',
        'years',
        'create_date',
        'expire_date'
    ];

    public function getHosting()
    {
        return $this->belongsTo('App\Models\Hosting', 'hosting_id', 'id');
    }
}
