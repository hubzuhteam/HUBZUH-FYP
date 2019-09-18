<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Banner;
use Image;
use App\Supplier;
use Session;

class BannersController extends Controller
{
    /////SUPPLIER////
    public function editBannerSupplier(Request $request, $id=null){
        $supplierDetails = Supplier::where(['email'=>Session::get('supplierSession')])->first();

        if($request->isMethod('post')){
            $data = $request->all();
            /*echo "<pre>"; print_r($data); die;*/

            if(empty($data['status'])){
                $status='0';
            }else{
                $status='1';
            }

            if(empty($data['title'])){
                $data['title'] = '';
            }

            if(empty($data['link'])){
                $data['link'] = '';
            }

            // Upload Image
            if($request->hasFile('image')){
                $image_tmp = Input::file('image');
                if ($image_tmp->isValid()) {
                    // Upload Images after Resize
                    $extension = $image_tmp->getClientOriginalExtension();
                    $fileName = rand(111,99999).'.'.$extension;
                    $banner_path = 'images/frontend_images/banners/'.$fileName;
                    Image::make($image_tmp)->resize(1140, 340)->save($banner_path);
                }
            }else if(!empty($data['current_image'])){
                $fileName = $data['current_image'];
            }else{
                $fileName = '';
            }


            Banner::where('id',$id)->update(['status'=>$status,'title'=>$data['title'],'link'=>$data['link'],'image'=>$fileName]);
            return redirect()->back()->with('flash_message_success','Banner has been edited Successfully');
        }
        $bannerDetails = Banner::where('id',$id)->first();
        return view('supplier.banners.edit_banner')->with(compact('bannerDetails','supplierDetails'));
    }

    public function viewBannersSupplier(){
        $supplierDetails = Supplier::where(['email'=>Session::get('supplierSession')])->first();

        $banners = Banner::where(['supplier_id'=>$supplierDetails->id])->orderBy('id','Desc')->get();



        return view('supplier.banners.view_banners')->with(compact('banners','supplierDetails'));
    }
    public function addBannerSupplier(Request $request){
        $supplierDetails = Supplier::where(['email'=>Session::get('supplierSession')])->first();

    	if($request->isMethod('post')){
    		$data = $request->all();
    		//echo "<pre>"; print_r($data); die;

    		$banner = new Banner;
			$banner->title = $data['title'];
			$banner->link = $data['link'];

            if(empty($data['status'])){
                $status='0';
            }else{
                $status='1';
            }

			// Upload Image
            if($request->hasFile('image')){
            	$image_tmp = Input::file('image');
                if ($image_tmp->isValid()) {
                    // Upload Images after Resize
                    $extension = $image_tmp->getClientOriginalExtension();
	                $fileName = rand(111,99999).'.'.$extension;
                    $banner_path = 'images/frontend_images/banners/'.$fileName;
     				Image::make($image_tmp)->resize(1140, 340)->save($banner_path);
     				$banner->image = $fileName;
                }
            }

            $banner->status = $status;
            $banner->supplier_id=$supplierDetails->id;
            $banner->save();


			return redirect()->back()->with('flash_message_success', 'Banner has been added successfully');
    	}

    	return view('supplier.banners.add_banner')->with(compact('supplierDetails'));
    }


    //////ADMIN/////
    public function addBanner(Request $request){
    	if($request->isMethod('post')){
    		$data = $request->all();
    		//echo "<pre>"; print_r($data); die;

    		$banner = new Banner;
			$banner->title = $data['title'];
			$banner->link = $data['link'];

            if(empty($data['status'])){
                $status='0';
            }else{
                $status='1';
            }

			// Upload Image
            if($request->hasFile('image')){
            	$image_tmp = Input::file('image');
                if ($image_tmp->isValid()) {
                    // Upload Images after Resize
                    $extension = $image_tmp->getClientOriginalExtension();
	                $fileName = rand(111,99999).'.'.$extension;
                    $banner_path = 'images/frontend_images/banners/'.$fileName;
     				Image::make($image_tmp)->resize(1140, 340)->save($banner_path);
     				$banner->image = $fileName;
                }
            }

            $banner->status = $status;
			$banner->save();
			return redirect()->back()->with('flash_message_success', 'Banner has been added successfully');
    	}

    	return view('admin.banners.add_banner');
    }

    public function editBanner(Request $request, $id=null){
        if($request->isMethod('post')){
            $data = $request->all();
            /*echo "<pre>"; print_r($data); die;*/

            if(empty($data['status'])){
                $status='0';
            }else{
                $status='1';
            }

            if(empty($data['title'])){
                $data['title'] = '';
            }

            if(empty($data['link'])){
                $data['link'] = '';
            }

            // Upload Image
            if($request->hasFile('image')){
                $image_tmp = Input::file('image');
                if ($image_tmp->isValid()) {
                    // Upload Images after Resize
                    $extension = $image_tmp->getClientOriginalExtension();
                    $fileName = rand(111,99999).'.'.$extension;
                    $banner_path = 'images/frontend_images/banners/'.$fileName;
                    Image::make($image_tmp)->resize(1140, 340)->save($banner_path);
                }
            }else if(!empty($data['current_image'])){
                $fileName = $data['current_image'];
            }else{
                $fileName = '';
            }


            Banner::where('id',$id)->update(['status'=>$status,'title'=>$data['title'],'link'=>$data['link'],'image'=>$fileName]);
            return redirect()->back()->with('flash_message_success','Banner has been edited Successfully');

        }
        $bannerDetails = Banner::where('id',$id)->first();
        return view('admin.banners.edit_banner')->with(compact('bannerDetails'));
    }

    public function viewBanners(){
        $banners = Banner::get();
        $supplierDetails = Supplier::where(['email'=>Session::get('supplierSession')])->first();


        return view('admin.banners.view_banners')->with(compact('banners','supplierDetails'));
    }

    public function deleteBanner($id = null){
        Banner::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Banner has been deleted successfully');
    }
}
