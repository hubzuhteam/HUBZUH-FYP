<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faq;
use App\Product;
use App\User;
use Session;
use App\Supplier;
use App\Factory;

class FaqController extends Controller
{
    public function editFaqAnswerFactory(Request $request, $id=null){
        $faq = Faq::where(['id'=>$id])->first();
        // echo "<pre>"; print_r($product); die;

        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

                    Faq::where(['id' => $id])
                    ->update(['answer' => $data['answer']]);

            return redirect('factory/view-faq/'.$faq->product_id)->with('flash_message_success', 'Answer has been updated successfully');
        }
    }
    public function viewFactoriesfaqs($id = null){

        $factoryDetails = Factory::where(['email'=>Session::get('factorySession')])->first();

        $product = Product::where(['id'=>$id])->first();

        // $reviewsid=[];
        // foreach ($products as $key => $value) {
        //     $reviewsid[]=$value->id;
        // }

        $faqs = Faq::where('product_id',$id)->orderBy('id','Desc')->get();

        $users = User::get();


        // echo "<pre>"; print_r($reviews); die;

        return view('factory.products.view_faqs_one_product')->with(compact('product','factoryDetails','faqs','users'));
    }

    public function viewFactoriesProductsfaqs(){

        $factoryDetails = Factory::where(['email'=>Session::get('factorySession')])->first();


        $products = Product::where(['factory_id'=>$factoryDetails->id])->orderBy('id','Desc')->get();


        // $reviewsid=[];
        // foreach ($products as $key => $value) {
        //     $reviewsid[]=$value->id;
        // }

        // $reviews = Review::whereIn('product_id',$reviewsid)->orderBy('id','Desc')->get();

        // echo "<pre>"; print_r($reviews); die;

        return view('factory.products.view_faqs')->with(compact('products','factoryDetails'));
    }
    public function editFaqAnswerSupplier(Request $request, $id=null){
        $faq = Faq::where(['id'=>$id])->first();
        // echo "<pre>"; print_r($product); die;

        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

                    Faq::where(['id' => $id])
                    ->update(['answer' => $data['answer']]);

            return redirect('supplier/view-faq/'.$faq->product_id)->with('flash_message_success', 'Answer has been updated successfully');
        }
    }
    public function viewfaqs($id = null){

        $supplierDetails = Supplier::where(['email'=>Session::get('supplierSession')])->first();

        $product = Product::where(['id'=>$id])->first();

        // $reviewsid=[];
        // foreach ($products as $key => $value) {
        //     $reviewsid[]=$value->id;
        // }

        $faqs = Faq::where('product_id',$id)->orderBy('id','Desc')->get();

        $users = User::get();


        // echo "<pre>"; print_r($reviews); die;

        return view('supplier.products.view_faqs_one_product')->with(compact('product','supplierDetails','faqs','users'));
    }
    public function viewProductsfaqs(){

        $supplierDetails = Supplier::where(['email'=>Session::get('supplierSession')])->first();


        $products = Product::where(['supplier_id'=>$supplierDetails->id])->orderBy('id','Desc')->get();


        // $reviewsid=[];
        // foreach ($products as $key => $value) {
        //     $reviewsid[]=$value->id;
        // }

        // $reviews = Review::whereIn('product_id',$reviewsid)->orderBy('id','Desc')->get();

        // echo "<pre>"; print_r($reviews); die;

        return view('supplier.products.view_faqs')->with(compact('products','supplierDetails'));
    }
    public function addfaq(Request $request,$id=nul){

        $data = $request->all();
        //    echo "<pre>"; print_r($data); die;

        $user = User::where(['email'=>Session::get('frontSession')])->first();
        $product = Product::where(['id'=>$id])->first();

        //    echo "<pre>"; print_r($user); die;

        $faq = new Faq;
           $faq->product_id = $id;
            if ($product->supplier_id=='') {
               $faq->factory_id = $product->factory_id;
            }
            else{
               $faq->supplier_id = $product->supplier_id;
            }
           $faq->user_id = $user->id;
           $faq->question = $data['question'];
           $faq->save();

           return redirect()->back()->with('flash_message_error','Your Question has been saved');


    }
}
