<?php

namespace App;
use App\Order;
use Illuminate\Database\Eloquent\Model;

class OrdersProduct extends Model
{
    public static function totalOrderCountSupplier($id){
        $totalOrderCountSupplier = OrdersProduct::where(['supplier_id'=>$id])->count();
    	return $totalOrderCountSupplier;
    }
    public static function earningOrderTotal($id){
        $totalOrderCountSupplier = OrdersProduct::where(['supplier_id'=>$id])->get();
        $ordersid=[];
        foreach ($totalOrderCountSupplier as $key => $value) {
            $ordersid[]=$value->order_id;
        }

        $orders = Order::with('orders')->orderBy('id','Desc')->whereIn('id',$ordersid)->get();
        $sum=0;
        foreach ($orders as  $value) {
            $sum=$sum+$value->grand_total;
        }
    	return $sum;
    }

    public static function totalOrderCountFactory($id){
        $totalOrderCountFactory = OrdersProduct::where(['factory_id'=>$id])->count();
    	return $totalOrderCountFactory;
    }
    public static function earningOrderTotalFactory($id){
        $totalOrderCountFactory = OrdersProduct::where(['factory_id'=>$id])->get();
        $ordersid=[];
        foreach ($totalOrderCountFactory as $key => $value) {
            $ordersid[]=$value->order_id;
        }

        $orders = Order::with('orders')->orderBy('id','Desc')->whereIn('id',$ordersid)->get();
        $sum=0;
        foreach ($orders as  $value) {
            $sum=$sum+$value->grand_total;
        }
    	return $sum;
    }
}
