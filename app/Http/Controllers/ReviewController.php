<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;
use App\User;
use Session;
use DB;
use App\Supplier;
use App\Product;
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

    public function delcomment($id=null){

        Review::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_error','Review Deleted Successfully');

    }
    public function viewProductsReviews(){

        $supplierDetails = Supplier::where(['email'=>Session::get('supplierSession')])->first();


        $products = Product::where(['supplier_id'=>$supplierDetails->id])->orderBy('id','Desc')->get();


        // $reviewsid=[];
        // foreach ($products as $key => $value) {
        //     $reviewsid[]=$value->id;
        // }

        // $reviews = Review::whereIn('product_id',$reviewsid)->orderBy('id','Desc')->get();

        // echo "<pre>"; print_r($reviews); die;

        return view('supplier.products.view_reviews')->with(compact('products','supplierDetails'));
    }

    public function viewReviews($id = null){

        $supplierDetails = Supplier::where(['email'=>Session::get('supplierSession')])->first();


        $product = Product::where(['id'=>$id])->first();


        // $reviewsid=[];
        // foreach ($products as $key => $value) {
        //     $reviewsid[]=$value->id;
        // }

        $reviews = Review::where('product_id',$id)->orderBy('id','Desc')->get();

        // echo "<pre>"; print_r($reviews); die;

        return view('supplier.products.view_reviews_one_product')->with(compact('product','supplierDetails','reviews'));
    }

}
