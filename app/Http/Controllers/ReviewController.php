<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;
use App\User;
use Session;
use DB;
class ReviewController extends Controller
{
    public function addcomment(Request $request,$id=nul){

        $data = $request->all();
        //    echo "<pre>"; print_r($data); die;

        $user = User::where(['email'=>Session::get('frontSession')])->first();
        //    echo "<pre>"; print_r($user); die;

        $product = new Review;
           $product->product_id = $id;
           $product->rating = $data['rate'];
           $product->user_id = $user->id;
           $product->heading = $data['heading'];
           $product->review = $data['review'];
           $product->save();


           return redirect()->back()->with('flash_message_error','Review Updated Successfully');


    }

}
