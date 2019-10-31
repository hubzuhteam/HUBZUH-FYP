<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function reviewCount(){
    	$reviewCount = Review::get()->count();
    	return $reviewCount;
    }

    public static function reviewCountSupplier($id=null){
        $products = Product::where(['supplier_id'=>$id])->orderBy('id','Desc')->get();

        $reviewsid=[];
        foreach ($products as $key => $value) {
            $reviewsid[]=$value->id;
        }
        $reviewsCount = Review::whereIn('product_id',$reviewsid)->count();

        return $reviewsCount;
    }
    public static function reviewCountFactory($id=null){
        $products = Product::where(['factory_id'=>$id])->orderBy('id','Desc')->get();

        $reviewsid=[];
        foreach ($products as $key => $value) {
            $reviewsid[]=$value->id;
        }
        $reviewsCount = Review::whereIn('product_id',$reviewsid)->count();

        return $reviewsCount;
    }
}
