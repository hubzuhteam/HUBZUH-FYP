<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    public static function CouponCountFactory($id=null){
        $CouponCount = Coupon::where(['factory_id'=>$id])->orderBy('id','Desc')->count();


        return $CouponCount;
    }
}
