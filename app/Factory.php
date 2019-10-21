<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factory extends Model
{
    public function products(){
    	return $this->hasMany('App\Product');
    }

    public static function factoryCount(){
    	$factoryCount = Factory::get()->count();
    	return $factoryCount;
    }
}
