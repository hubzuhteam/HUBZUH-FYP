<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faq;
use App\Product;
use App\User;
use Session;

class FaqController extends Controller
{
    public function addfaq(Request $request,$id=nul){

        $data = $request->all();
        //    echo "<pre>"; print_r($data); die;

        $user = User::where(['email'=>Session::get('frontSession')])->first();
        $product = Product::where(['id'=>$id])->first();

        //    echo "<pre>"; print_r($user); die;

        $faq = new Faq;
           $faq->product_id = $id;
           $faq->supplier_id = $product->supplier_id;
           $faq->user_id = $user->id;
           $faq->question = $data['question'];
           $faq->save();

           return redirect()->back()->with('flash_message_error','Your Question has been saved');


    }
}
