<?php

namespace App;

use App\Company;
use App\Photo;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{

	protected $fillable = ['start' , 'end' , 'price' , 'tourName' , 'country' , 'about' , 'flyPoint','latin' , 'hotel','days'];


    public function company()
    {
    	return $this->belongsTo(Company::class);
    }

    public function photos()
    {
    	return $this->hasMany(Photo::class);
    }

		public function basket(){

			 return $this->hasMany('App\Basket','tour_id');

	 }




}
