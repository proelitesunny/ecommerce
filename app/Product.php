<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category(){
    	return $this->belongsTo('App\Category');
    }
    public function features(){
    	return $this->hasMany('App\Feature');
    }
    public function reviews(){
    	return $this->hasMany('App\Review');
    }
}
