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

    
}
