<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Client extends Model
{
    use HasFactory;

    /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name',
      'lastname',
      'email',
      'phone',
  ];

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