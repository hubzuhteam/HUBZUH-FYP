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

    public function viewProductsReviews(){

        $supplierDetails = Supplier::where(['email'=>Session::get('supplierSession')])->first();


        $products = Product::where(['supplier_id'=>$supplierDetails->id])->orderBy('id','Desc')->get();

        $reviews = Review::whereIn('product_id',[$products])->orderBy('id','Desc')->get();

        echo "<pre>"; print_r($products); die;

        return view('supplier.products.view_products')->with(compact('products','supplierDetails','reviews'));
    }

}
