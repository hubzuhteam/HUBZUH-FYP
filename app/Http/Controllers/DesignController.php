<?php

namespace App\Http\Controllers;

use App\Design;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Image;
use App\Admin;
use Session;

class DesignController extends Controller
{
    public function deleteDesign(Request $request, $id = null){
        if(!empty($id)){
            Design::where(['id'=>$id])->delete();
            return redirect()->back()->with('flash_message_success','Design deleted Successfully!');
        }
    }

    public function viewDesigns(){
        
         $designs = Design::orderBy('id','Desc')->get();
         $designs = json_decode(json_encode($designs));
         
        //     //echo "<pre>"; print_r($products); die;
          return view('admin.designs.view_designs')->with(compact('designs'));
    }

    public function addDesign(Request $request){
        // if(Session::has('adminSession')){
        // }else {
        //     return redirect('/admin')->with('flash_message_error','Please Login to success');
        // }
        if($request->isMethod('post')){
            $data = $request->all();

            $design = new Design;

            if($request->hasFile('image')){
                $image_tmp = Input::file('image');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/backend_images/backgrounds/large/'.$filename;
                    $medium_image_path = 'images/backend_images/backgrounds/medium/'.$filename;
                    $small_image_path = 'images/backend_images/backgrounds/small/'.$filename;
                    // Resize Images
                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(300,300)->save($small_image_path);

                    // Store image name in products table
                    $design->background_img = $filename;
                }
            }
            $adminDetails = Admin::where(['username'=>Session::get('adminSession')])->first();
           $design->admin_id=$adminDetails->id;
            $design->save();
            return redirect('/admin/add-design')->with('flash_message_success','Design has been added successfully!');

        }

    return view('admin.designs.add_design');
    }

    public function addProductFactory(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            if(empty($data['category_id'])){
                return redirect()->back()->with('flash_message_error','Under Category is missing!');
            }
           $product = new Product;
           $product->category_id = $data['category_id'];
           $product->product_name = $data['product_name'];
           $product->product_code = $data['product_code'];
           $product->product_color = $data['product_color'];
           if(!empty($data['description'])){
               $product->description = $data['description'];
           }else{
               $product->description = '';
           }
           if(!empty($data['sleeve'])){
               $product->sleeve = $data['sleeve'];
           }else{
               $product->sleeve = '';
           }
           if(!empty($data['pattern'])){
               $product->pattern = $data['pattern'];
           }else{
               $product->pattern = '';
           }
           if(!empty($data['care'])){
               $product->care = $data['care'];
           }else{
               $product->care = '';
           }
            $product->price = $data['price'];
       //  	$product->price = '';
            // Upload Image
            if(empty($data['feature_item'])){
               $feature_item='0';
           }else{
               $feature_item='1';
           }
           if (empty($data['status'])) {
               $status=0;
           } else {
              $status=1;
           }
           if(!empty($data['video'])){
               $product->video = $data['video'];
           }else{
               $product->video = '';
           }
            if($request->hasFile('image')){
                $image_tmp = Input::file('image');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/factoryend_images/products/large/'.$filename;
                    $medium_image_path = 'images/factoryend_images/products/medium/'.$filename;
                    $small_image_path = 'images/factoryend_images/products/small/'.$filename;
                    // Resize Images
                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(300,300)->save($small_image_path);

                    // Store image name in products table
                    $product->image = $filename;
                }
            }
            // Upload Video
           if($request->hasFile('video')){
               $video_tmp = Input::file('video');
               $video_name = $video_tmp->getClientOriginalName();
               $video_path = 'videos/';
               $video_tmp->move($video_path,$video_name);
               $product->video = $video_name;
           }
            $product->feature_item = $feature_item;
            $product->status=$status;
            $factoryDetails = Factory::where(['email'=>Session::get('factorySession')])->first();
           $product->factory_id=$factoryDetails->id;
            $product->save();
            //return redirect()->back()->with('flash_message_success','Product has been added successfully!');
               return redirect('/factory/view-products')->with('flash_message_success','Product has been added successfully!');
        }

        //categories drop down start
        $categories = Category::where(['parent_id'=>0])->get();
        $categories_dropdown = "<option value='' selected disabled>Select</option>";
        foreach($categories as $cat){
            $categories_dropdown .= "<option value='".$cat->id."'>".$cat->name."</option>";
            $sub_categories = Category::where(['parent_id'=>$cat->id])->get();
            foreach ($sub_categories as $sub_cat) {
                $categories_dropdown .= "<option value = '".$sub_cat->id."'>&nbsp;--&nbsp;".$sub_cat->name."</option>";
            }
        }
        //categories drop down end

        $sleeveArray = array('Full Sleeve','Half Sleeve','Short Sleeve','Sleeveless');

        $patternArray = array('Checked','Plain','Printed','Self','Solid');
        $factoryDetails = Factory::where(['email'=>Session::get('factorySession')])->first();

        return view('factory.products.add_product')->with(compact('categories_dropdown','factoryDetails','sleeveArray','patternArray'));
       //return view('admin.products.add_product');
    }
}
