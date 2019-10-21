<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public static function orderCount(){
    	$orderCount = Order::get()->count();
    	return $orderCount;
    }
    public static function earningOrderTotal(){
        $earningOrderTotal = Order::whereIn('order_status',['delivered','shipped','paid'])->get();
        $sum=0;
        foreach ($earningOrderTotal as  $value) {
            $sum=$sum+$value->grand_total;
        }
    	return $sum;
    }
    public static function pendingOrderCount(){
    	$pendingorderCount = Order::whereIn('order_status',['pending','in process','new'])->get()->count();
    	return $pendingorderCount;
    }
    public function orders(){
    	return $this->hasMany('App\OrdersProduct','order_id');
    }

    public static function getOrderDetails($order_id){
    	$getOrderDetails = Order::where('id',$order_id)->first();
    	return $getOrderDetails;
    }

    public static function getCountryCode($country){
    	$getCountryCode = Country::where('country_name',$country)->first();
    	return $getCountryCode;
    }
}
