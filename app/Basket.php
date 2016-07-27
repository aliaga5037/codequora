<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{

  protected $fillable = [
      'id','tour_id', 'user_id',
  ];


  // public function user(){
  //
  //     return $this->belongsTo('App\User');
  //
  // }

  public function tour(){

      return $this->belongsToMany('App\Tour');

  }

  public function user(){

      return $this->belongsToMany('App\User');

  }





}
