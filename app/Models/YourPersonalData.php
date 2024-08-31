<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YourPersonalData extends Model
{
    use HasFactory;

    public function country(){
        return $this->belongsTo(Country::class,'country_id','id');
    }
   
    public function city(){
        return $this->belongsTo(City::class,'city_id','id');
    }  

    public function edu(){
        return $this->belongsTo(Education::class,'edu_id','id');
    }

    public function profession(){
        return $this->belongsTo(Profession::class,'prof_id','id');
    }

    public function country_info()
    {
        return $this->hasMany('App\Models\YourPersonalData'::class, 'user_id','id');
    }

}
