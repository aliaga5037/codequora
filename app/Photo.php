<?php

namespace App;

use App\Tour;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{

	protected $fillable = ['file_name','file_size','file_mime','file_path' , 'company_id'];

   public function tour()
    {
    	return $this->belongsTo(Tour::class);
    }
}
