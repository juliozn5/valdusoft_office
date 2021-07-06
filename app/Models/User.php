<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'last_name',
        'slug',
        'email',
        'phone',
        'birthdate',
        'admission_date',
        'password',
        'position',
        'curriculum',
        'price_per_hour',
        'uphold_account',
        'tron_wallet',
        'profile_id',
        'photo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile(){
        return $this->belongsTo('App\Models\Profile');
    }

    //Relación del cliente con sus proyectos
    public function projects_client(){
        return $this->hasMany('App\Models\Project');
    }

    //Relación del cliente con sus hostings
    public function hostings(){
        return $this->hasMany('App\Models\Hosting');
    }

    //Relación del cliente con sus facturas
    public function bills(){
        return $this->hasMany('App\Models\Bill');
    }
    
    //Relación de los empleados con los proyectos
    public function projects(){
        return $this->belongsToMany('App\Models\Project', 'projects_users', 'user_id', 'project_id');
    }

    //Relación de los empleados con los skills
    public function skills(){
        return $this->belongsToMany('App\Models\Skill', 'skills_users', 'user_id', 'skill_id');

    }

    //Relación del usuario con el chat
    public function chats(){
        return $this->hasMany('App\Models\Chat');
    }

    public function getPhotoUrlAttribute()
    {
        if($this->getMedia('photo')->isEmpty())
        {
            return $this->role == "completion specialist" ?  "/img/completion_photo.png" : "/img/user_photo.jpg";
        } else {
            return $this->getMedia('photo')->first()->file;
        }
    }
      //Relación de pagos con sus pagos
      public function payments(){
        return $this->hasMany('App\Models\Payments');
    }
    //Relación de nominas con sus pagos
    public function payrolls(){
        return $this->hasMany('App\Models\PayrollEmployee');
    }

    //Relación con los pagos de abonos de financiamiento
    public function financing_payments(){
        return $this->hasMany('App\Models\FinancePayment');
    }
}
