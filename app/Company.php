<?php

namespace App;

use App\Tour;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Company extends Authenticatable
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'founderName','founderSurname', 'companyName','companyDate','companyAbout','email','password',
  ];

  

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'password', 'remember_token',
  ];

  public function tours()
    {
      return $this->hasMany(Tour::class);
    }
}
