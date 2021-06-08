<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


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

    //Relación de los empleados con los proyectos
    public function projects(){
        return $this->belongsToMany('App\Models\Project', 'projects_users', 'user_id', 'project_id');
    }

    public function skills(){
        return $this->belongsToMany('App\Models\Skill', 'skills_users', 'user_id', 'skill_id');
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
}
