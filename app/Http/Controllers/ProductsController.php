<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Session;
use Image;
use App\Category;
use App\Product;
use App\ProductsAttribute;
use App\ProductsImage;
use App\Coupon;
use App\User;
use App\Country;
use App\DeliveryAddress;
use App\Order;
use App\OrdersProduct;
use App\Supplier;
use DB;
use App\Banner;
use App\Factory;
use App\Review;

class ProductsController extends Controller
{
    ///////////////////////////////FACTORY START///////////////////////////////////////

    public function updateOrderStatusFactory(Request $request){

        if($request->isMethod('post')){
            $data = $request->all();
            Order::where('id',$data['order_id'])->update(['order_status'=>$data['order_status']]);
            return redirect()->back()->with('flash_message_success','Order Status has been updated successfully!');
        }
    }
    public function viewOrderDetailsFactory($order_id){

        $orderDetails = Order::with('orders')->where('id',$order_id)->first();
        $orderDetails = json_decode(json_encode($orderDetails));
        /*echo "<pre>"; print_r($orderDetails); die;*/
        $user_id = $orderDetails->user_id;
        $userDetails = User::where('id',$user_id)->first();
        /*$userDetails = json_decode(json_encode($userDetails));
        echo "<pre>"; print_r($userDetails);*/
        $factoryDetails = Factory::where(['email'=>Session::get('factorySession')])->first();

        return view('factory.orders.order_details')->with(compact('orderDetails','userDetails','factoryDetails'));
    }
    public function viewOrderInvoiceFactory($order_id){
        $orderDetails = Order::with('orders')->where('id',$order_id)->first();
        // $orderDetails = json_decode(json_encode($orderDetails));
        // /echo "<pre>"; print_r($orderDetails); die;/
        $user_id = $orderDetails->user_id;
        $userDetails = User::where('id',$user_id)->first();
        /*$userDetails = json_decode(json_encode($userDetails));
        echo "<pre>"; print_r($userDetails);*/
        $factoryDetails = Factory::where(['email'=>Session::get('factorySession')])->first();

        return view('factory.orders.order_invoice')->with(compact('orderDetails','userDetails','factoryDetails'));
    }
    public function viewOrdersFactory(){

        $orders = Order::with('orders')->orderBy('id','Desc')->get();
        $orders = json_decode(json_encode($orders));
        /*echo "<pre>"; print_r($orders); die;*/

        $factoryDetails = Factory::where(['email'=>Session::get('factorySession')])->first();

        $ordersproducts = OrdersProduct::orderBy('id','Desc')->where(['factory_id'=>$factoryDetails->id])->get();
        $ordersid=[];
        foreach ($ordersproducts as $key => $value) {
            $ordersid[]=$value->order_id;
        }
         $orders = Order::with('orders')->orderBy('id','Desc')->whereIn('id',$ordersid)->get();
        //   echo "<pre>"; print_r($orders); die;

        return view('factory.orders.view_orders')->with(compact('orders','factoryDetails','ordersproducts'));
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
                    $large_image_path = 'images/supplierend_images/products/large/'.$filename;
                    $medium_image_path = 'images/supplierend_images/products/medium/'.$filename;
                    $small_image_path = 'images/supplierend_images/products/small/'.$filename;
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

    public function editProductFactory(Request $request,$id=null){

        $factoryDetails = Factory::where(['email'=>Session::get('factorySession')])->first();
        $productDetails = Product::where(['id'=>$id])->first();

        if($factoryDetails->id!=$productDetails->factory_id){
         $products = Product::where(['factory_id'=>$factoryDetails->id])->orderBy('id','Desc')->get();
            return view('factory.products.view_products')->with(compact('products','factoryDetails'));
        }

		if($request->isMethod('post')){

			$data = $request->all();
			//echo "<pre>"; print_r($data); die;
            if(empty($data['status'])){
                $status='0';
            }else{
                $status='1';
            }
            if(!empty($data['sleeve'])){
                $sleeve = $data['sleeve'];
            }else{
                $sleeve = '';
            }

            if(!empty($data['pattern'])){
                $pattern = $data['pattern'];
            }else{
                $pattern = '';
            }

			// Upload Image
            if($request->hasFile('image')){
            	$image_tmp = Input::file('image');
                if ($image_tmp->isValid()) {
                    // Upload Images after Resize
                    $extension = $image_tmp->getClientOriginalExtension();
	                $fileName = rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/supplierend_images/products/large'.'/'.$fileName;
                    $medium_image_path = 'images/supplierend_images/products/medium'.'/'.$fileName;
                    $small_image_path = 'images/supplierend_images/products/small'.'/'.$fileName;

	                Image::make($image_tmp)->save($large_image_path);
 					Image::make($image_tmp)->resize(600, 600)->save($medium_image_path);
     				Image::make($image_tmp)->resize(300, 300)->save($small_image_path);

                }
            }else if(!empty($data['current_image'])){
            	$fileName = $data['current_image'];
            }else{
            	$fileName = '';
            }

            // Upload Video
            if($request->hasFile('video')){
                $video_tmp = Input::file('video');
                $video_name = $video_tmp->getClientOriginalName();
                $video_path = 'videos/';
                $video_tmp->move($video_path,$video_name);
                $videoName = $video_name;
            }else if(!empty($data['current_video'])){
                $videoName = $data['current_video'];
            }else{
                $videoName = '';
            }


            if(empty($data['description'])){
            	$data['description'] = '';
            }

            if(empty($data['care'])){
                $data['care'] = '';
            }
            Product::where(['id'=>$id])->update(['category_id'=>$data['category_id'],
            'product_name'=>$data['product_name'],'status'=>$status,
                'product_code'=>$data['product_code'],'product_color'=>$data['product_color'],
                'description'=>$data['description'],'care'=>$data['care'],'price'=>$data['price'],
                'image'=>$fileName,'video'=>$videoName,'sleeve'=>$sleeve,'pattern'=>$pattern]);

			return redirect()->back()->with('flash_message_success', 'Product has been edited successfully');
		}

		// Get Product Details start //
		$productDetails = Product::where(['id'=>$id])->first();
		// Get Product Details End //

		// Categories drop down start //
		$categories = Category::where(['parent_id' => 0])->get();

		$categories_drop_down = "<option value='' disabled>Select</option>";
		foreach($categories as $cat){
			if($cat->id==$productDetails->category_id){
				$selected = "selected";
			}else{
				$selected = "";
			}
			$categories_drop_down .= "<option value='".$cat->id."' ".$selected.">".$cat->name."</option>";
			$sub_categories = Category::where(['parent_id' => $cat->id])->get();
			foreach($sub_categories as $sub_cat){
				if($sub_cat->id==$productDetails->category_id){
					$selected = "selected";
				}else{
					$selected = "";
				}
				$categories_drop_down .= "<option value='".$sub_cat->id."' ".$selected.">&nbsp;&nbsp;--&nbsp;".$sub_cat->name."</option>";
			}
		}
        // Categories drop down end //


        $sleeveArray = array('Full Sleeve','Half Sleeve','Short Sleeve','Sleeveless');
        $patternArray = array('Checked','Plain','Printed','Self','Solid');


		return view('factory.products.edit_product')->with(compact('productDetails','factoryDetails','categories_drop_down','sleeveArray','patternArray' ));
    }
    public function deleteProductFactory($id = null){
        $productImage = Product::where('id',$id)->first();
        //echo $productImage;die;
        //echo "<pre>"; print_r($productImage); die;
        Product::where(['id'=>$id])->delete();
        ProductsAttribute::where(['product_id'=>$id])->delete();


        // Get Product Image Paths
		$large_image_path = 'images/supplierend_images/products/large/';
		$medium_image_path = 'images/supplierend_images/products/medium/';
		$small_image_path = 'images/supplierend_images/products/small/';

		// Delete Large Image if  exists in Folder
        if(file_exists($large_image_path.$productImage->image)){
            unlink($large_image_path.$productImage->image);
        }

        // Delete Medium Image if  exists in Folder
        if(file_exists($medium_image_path.$productImage->image)){
            unlink($medium_image_path.$productImage->image);
        }

        // Delete Small Image if exists in Folder
        if(file_exists($small_image_path.$productImage->image)){
            unlink($small_image_path.$productImage->image);
        }
        $productImage = ProductsImage::where('product_id',$id)->first();
        // Get Product Image Paths
        $large_image_path = 'images/supplierend_images/products/large/';
        $medium_image_path = 'images/supplierend_images/products/medium/';
        $small_image_path = 'images/supplierend_images/products/small/';

        // Delete Large Image if not exists in Folder
        if(file_exists($large_image_path.$productImage->image)){
            unlink($large_image_path.$productImage->image);
        }

        // Delete Medium Image if not exists in Folder
        if(file_exists($medium_image_path.$productImage->image)){
            unlink($medium_image_path.$productImage->image);
        }

        // Delete Small Image if not exists in Folder
        if(file_exists($small_image_path.$productImage->image)){
            unlink($small_image_path.$productImage->image);
        }
        ProductsImage::where(['product_id'=>$id])->delete();

        return redirect()->back()->with('flash_message_success', 'Product has been deleted successfully');
    }
    public function viewProductsFactory(){

        $factoryDetails = Factory::where(['email'=>Session::get('factorySession')])->first();

         $products = Product::where(['factory_id'=>$factoryDetails->id])->orderBy('id','Desc')->get();
         $products = json_decode(json_encode($products));
         foreach($products as $key => $val){
             $category_name = Category::where(['id'=>$val->category_id])->first();
             $products[$key]->category_name = $category_name->name;
         }
        //     //echo "<pre>"; print_r($products); die;

        return view('factory.products.view_products')->with(compact('products','factoryDetails'));
    }

    public function deleteProductImageFactory($id=null){
		// Get Product Image
		$productImage = Product::where('id',$id)->first();

        $factoryDetails = Factory::where(['email'=>Session::get('factorySession')])->first();
        $productDetails = Product::where(['id'=>$id])->first();

        if($factoryDetails->id!=$productDetails->factory_id){
         $products = Product::where(['factory_id'=>$factoryDetails->id])->orderBy('id','Desc')->get();
            return view('factory.products.view_products')->with(compact('products','factoryDetails'));
        }
		// Get Product Image Paths
		$large_image_path = 'images/supplierend_images/products/large/';
		$medium_image_path = 'images/supplierend_images/products/medium/';
		$small_image_path = 'images/supplierend_images/products/small/';

		// Delete Large Image if not exists in Folder
        if(file_exists($large_image_path.$productImage->image)){
            unlink($large_image_path.$productImage->image);
        }

        // Delete Medium Image if not exists in Folder
        if(file_exists($medium_image_path.$productImage->image)){
            unlink($medium_image_path.$productImage->image);
        }

        // Delete Small Image if not exists in Folder
        if(file_exists($small_image_path.$productImage->image)){
            unlink($small_image_path.$productImage->image);
        }

        // Delete Image from Products table
        Product::where(['id'=>$id])->update(['image'=>'']);

        return redirect()->back()->with('flash_message_success', 'Product image has been deleted successfully');
	}
    public function deleteAltImageFactory($id=null){
		// Get Product Image
        $productImage = ProductsImage::where('id',$id)->first();

        // Get Product Image Paths
        $large_image_path = 'images/supplierend_images/products/large/';
        $medium_image_path = 'images/supplierend_images/products/medium/';
        $small_image_path = 'images/supplierend_images/products/small/';

        // Delete Large Image if not exists in Folder
        if(file_exists($large_image_path.$productImage->image)){
            unlink($large_image_path.$productImage->image);
        }

        // Delete Medium Image if not exists in Folder
        if(file_exists($medium_image_path.$productImage->image)){
            unlink($medium_image_path.$productImage->image);
        }

        // Delete Small Image if not exists in Folder
        if(file_exists($small_image_path.$productImage->image)){
            unlink($small_image_path.$productImage->image);
        }

        // Delete Image from Products Images table
        ProductsImage::where(['id'=>$id])->delete();

        return redirect()->back()->with('flash_message_success', 'Product alternate image(s) has been deleted successfully');
    }

    public function deleteProductVideoFactory($id){
        if (Session::get('adminDetails')['products_access']==0){
            return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
        }
        // Get Video Name
        $productVideo = Product::select('video')->where('id',$id)->first();

        // Get Video Path
        $video_path = 'videos/';

        // Delete Video if exists in videos folder
        if(file_exists($video_path.$productVideo->video)){
            unlink($video_path.$productVideo->video);
        }

        // Delete Video from Products table
        Product::where('id',$id)->update(['video'=>'']);

        return redirect()->back()->with('flash_message_success','Product Video has been deleted successfully');
    }

    public function addAttributesFactory(Request $request, $id=null){
        $productDetails = Product::with('attributes')->where(['id' => $id])->first();

        //echo "a";die;
        //$productDetails = json_decode(json_encode($productDetails));
        //echo "<pre>"; print_r($productDetails); die;
        //$categoryDetails = Category::where(['id'=>$productDetails->category_id])->first();
        //$category_name = $categoryDetails->name;
        if($request->isMethod('post')){
            $data = $request->all();
             //  echo "<pre>"; print_r($data); die;
            foreach($data['sku'] as $key => $val){
                //Sku check preveting duplicate
                if(!empty($val)){
                      $attrCountSKU = ProductsAttribute::where(['sku'=>$val])->count();
                    if($attrCountSKU>0){
                        return redirect('factory/add-attributes/'.$id)->with('flash_message_error', 'SKU already exists. Please add another SKU.');
                    }
                    //size check preventing duplicate
                      $attrCountSizes = ProductsAttribute::where(['product_id'=>$id,'size'=>$data['size'][$key]])->count();
                      if($attrCountSizes>0){
                       return redirect('factory/add-attributes/'.$id)->with('flash_message_error',
                        '"'.$data['size'][$key].'" Size already exists. Please add another Attribute.');
                      }
                    $attr=new ProductsAttribute;
                       $attr->product_id = $id;
                       $attr->sku = $val;
                       $attr->size = $data['size'][$key];
                       $attr->price = $data['price'][$key];
                       $attr->stock = $data['stock'][$key];
                       $attr->save();
                  }
               }
            return redirect('factory/add-attributes/'.$id)->with('flash_message_success', 'Product Attributes has been added successfully');
          }
       // $title = "Add Attributes";
       //->with(compact('title','productDetails','category_name'))
       $factoryDetails = Factory::where(['email'=>Session::get('factorySession')])->first();

       return view('factory.products.add_attributes')->with(compact('productDetails','factoryDetails'));
   }
   public function editAttributesFactory(Request $request, $id=null){

       if($request->isMethod('post')){
           $data = $request->all();
           /*echo "<pre>"; print_r($data); die;*/
           foreach($data['idAttr'] as $key=> $attr){
               if(!empty($attr)){
                   ProductsAttribute::where(['id' => $data['idAttr'][$key]])
                   ->update(['price' => $data['price'][$key], 'stock' => $data['stock'][$key]]);
               }
           }
           return redirect('factory/add-attributes/'.$id)->with('flash_message_success', 'Product Attributes has been updated successfully');
       }
   }
   public function deleteAttributeFactory($id = null){
       ProductsAttribute::where(['id'=>$id])->delete();
       return redirect()->back()->with('flash_message_success', 'Product Attribute has been deleted successfully');
   }
   public function addImagesFactory(Request $request, $id=null){
    $productDetails = Product::with('attributes')->where(['id' => $id])->first();

    if($request->isMethod('post')){
        $data = $request->all();
        if ($request->hasFile('image')) {
            $files = $request->file('image');

            foreach($files as $file){
                // Upload Images after Resize
                $image = new ProductsImage;
                $extension = $file->getClientOriginalExtension();
                $fileName = rand(111,99999).'.'.$extension;
                $large_image_path = 'images/supplierend_images/products/large'.'/'.$fileName;
                $medium_image_path = 'images/supplierend_images/products/medium'.'/'.$fileName;
                $small_image_path = 'images/supplierend_images/products/small'.'/'.$fileName;
                Image::make($file)->save($large_image_path);
                Image::make($file)->resize(600, 600)->save($medium_image_path);
                Image::make($file)->resize(300, 300)->save($small_image_path);
                $image->image = $fileName;
                $image->product_id = $data['product_id'];
                $image->save();
            }
        }
            return redirect('factory/add-images/'.$id)->with('flash_message_success', 'Product Images has been added successfully');

    }

    $productImages = ProductsImage::where(['product_id' => $id])->orderBy('id','DESC')->get();
    $title = "Add Images";
    $factoryDetails = Factory::where(['email'=>Session::get('factorySession')])->first();

    return view('factory.products.add_images')->with(compact('productDetails','productImages','factoryDetails'));
}





    /////////////////////////////////END OF FACTORY//////////////////////////////////

    public function updateOrderStatusSupplier(Request $request){

        if($request->isMethod('post')){
            $data = $request->all();
            Order::where('id',$data['order_id'])->update(['order_status'=>$data['order_status']]);
            return redirect()->back()->with('flash_message_success','Order Status has been updated successfully!');
        }
    }
    public function viewOrderInvoiceSupplier($order_id){
        $orderDetails = Order::with('orders')->where('id',$order_id)->first();
        // $orderDetails = json_decode(json_encode($orderDetails));
        /*echo "<pre>"; print_r($orderDetails); die;*/
        $user_id = $orderDetails->user_id;
        $userDetails = User::where('id',$user_id)->first();
        /*$userDetails = json_decode(json_encode($userDetails));
        echo "<pre>"; print_r($userDetails);*/
        $supplierDetails = Supplier::where(['email'=>Session::get('supplierSession')])->first();

        return view('supplier.orders.order_invoice')->with(compact('orderDetails','userDetails','supplierDetails'));
    }
    public function viewOrderDetailsSupplier($order_id){

        $orderDetails = Order::with('orders')->where('id',$order_id)->first();
        $orderDetails = json_decode(json_encode($orderDetails));
        /*echo "<pre>"; print_r($orderDetails); die;*/
        $user_id = $orderDetails->user_id;
        $userDetails = User::where('id',$user_id)->first();
        /*$userDetails = json_decode(json_encode($userDetails));
        echo "<pre>"; print_r($userDetails);*/
        $supplierDetails = Supplier::where(['email'=>Session::get('supplierSession')])->first();

        return view('supplier.orders.order_details')->with(compact('orderDetails','userDetails','supplierDetails'));
    }
    public function viewOrdersSupplier(){

        $orders = Order::with('orders')->orderBy('id','Desc')->get();
        $orders = json_decode(json_encode($orders));
        /*echo "<pre>"; print_r($orders); die;*/

        $supplierDetails = Supplier::where(['email'=>Session::get('supplierSession')])->first();

        $ordersproducts = OrdersProduct::orderBy('id','Desc')->where(['supplier_id'=>$supplierDetails->id])->get();
        $ordersid=[];
        foreach ($ordersproducts as $key => $value) {
            $ordersid[]=$value->order_id;
        }
         $orders = Order::with('orders')->orderBy('id','Desc')->whereIn('id',$ordersid)->get();
        //   echo "<pre>"; print_r($orders); die;

        return view('supplier.orders.view_orders')->with(compact('orders','supplierDetails','ordersproducts'));
    }
    public function addProductSupplier(Request $request){
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
    	 			$large_image_path = 'images/supplierend_images/products/large/'.$filename;
    	 			$medium_image_path = 'images/supplierend_images/products/medium/'.$filename;
    	 			$small_image_path = 'images/supplierend_images/products/small/'.$filename;
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
             $supplierDetails = Supplier::where(['email'=>Session::get('supplierSession')])->first();
            $product->supplier_id=$supplierDetails->id;
    	 	$product->save();
    	 	//return redirect()->back()->with('flash_message_success','Product has been added successfully!');
                return redirect('/supplier/view-products')->with('flash_message_success','Product has been added successfully!');
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
         $supplierDetails = Supplier::where(['email'=>Session::get('supplierSession')])->first();

         return view('supplier.products.add_product')->with(compact('categories_dropdown','supplierDetails','sleeveArray','patternArray'));
        //return view('admin.products.add_product');
    }
  //  //===================================================================================//
  //  //===================================================================================//
   // //===================================================================================//
   // //===================================================================================//
    public function editProductSupplier(Request $request,$id=null){

        $supplierDetails = Supplier::where(['email'=>Session::get('supplierSession')])->first();
        $productDetails = Product::where(['id'=>$id])->first();

        if($supplierDetails->id!=$productDetails->supplier_id){
         $products = Product::where(['supplier_id'=>$supplierDetails->id])->orderBy('id','Desc')->get();
            return view('supplier.products.view_products')->with(compact('products','supplierDetails'));
        }

		if($request->isMethod('post')){

			$data = $request->all();
			//echo "<pre>"; print_r($data); die;
            if(empty($data['status'])){
                $status='0';
            }else{
                $status='1';
            }
            if(!empty($data['sleeve'])){
                $sleeve = $data['sleeve'];
            }else{
                $sleeve = '';
            }

            if(!empty($data['pattern'])){
                $pattern = $data['pattern'];
            }else{
                $pattern = '';
            }

			// Upload Image
            if($request->hasFile('image')){
            	$image_tmp = Input::file('image');
                if ($image_tmp->isValid()) {
                    // Upload Images after Resize
                    $extension = $image_tmp->getClientOriginalExtension();
	                $fileName = rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/supplierend_images/products/large'.'/'.$fileName;
                    $medium_image_path = 'images/supplierend_images/products/medium'.'/'.$fileName;
                    $small_image_path = 'images/supplierend_images/products/small'.'/'.$fileName;

	                Image::make($image_tmp)->save($large_image_path);
 					Image::make($image_tmp)->resize(600, 600)->save($medium_image_path);
     				Image::make($image_tmp)->resize(300, 300)->save($small_image_path);

                }
            }else if(!empty($data['current_image'])){
            	$fileName = $data['current_image'];
            }else{
            	$fileName = '';
            }

            // Upload Video
            if($request->hasFile('video')){
                $video_tmp = Input::file('video');
                $video_name = $video_tmp->getClientOriginalName();
                $video_path = 'videos/';
                $video_tmp->move($video_path,$video_name);
                $videoName = $video_name;
            }else if(!empty($data['current_video'])){
                $videoName = $data['current_video'];
            }else{
                $videoName = '';
            }


            if(empty($data['description'])){
            	$data['description'] = '';
            }

            if(empty($data['care'])){
                $data['care'] = '';
            }
            Product::where(['id'=>$id])->update(['category_id'=>$data['category_id'],
            'product_name'=>$data['product_name'],'status'=>$status,
                'product_code'=>$data['product_code'],'product_color'=>$data['product_color'],
                'description'=>$data['description'],'care'=>$data['care'],'price'=>$data['price'],
                'image'=>$fileName,'video'=>$videoName,'sleeve'=>$sleeve,'pattern'=>$pattern]);

			return redirect()->back()->with('flash_message_success', 'Product has been edited successfully');
		}

		// Get Product Details start //
		$productDetails = Product::where(['id'=>$id])->first();
		// Get Product Details End //

		// Categories drop down start //
		$categories = Category::where(['parent_id' => 0])->get();

		$categories_drop_down = "<option value='' disabled>Select</option>";
		foreach($categories as $cat){
			if($cat->id==$productDetails->category_id){
				$selected = "selected";
			}else{
				$selected = "";
			}
			$categories_drop_down .= "<option value='".$cat->id."' ".$selected.">".$cat->name."</option>";
			$sub_categories = Category::where(['parent_id' => $cat->id])->get();
			foreach($sub_categories as $sub_cat){
				if($sub_cat->id==$productDetails->category_id){
					$selected = "selected";
				}else{
					$selected = "";
				}
				$categories_drop_down .= "<option value='".$sub_cat->id."' ".$selected.">&nbsp;&nbsp;--&nbsp;".$sub_cat->name."</option>";
			}
		}
        // Categories drop down end //


        $sleeveArray = array('Full Sleeve','Half Sleeve','Short Sleeve','Sleeveless');
        $patternArray = array('Checked','Plain','Printed','Self','Solid');


		return view('supplier.products.edit_product')->with(compact('productDetails','supplierDetails','categories_drop_down','sleeveArray','patternArray' ));
    }
    public function deleteProductSupplier($id = null){
        $productImage = Product::where('id',$id)->first();

        //echo $productImage;die;
        //echo "<pre>"; print_r($productImage); die;

        Product::where(['id'=>$id])->delete();
        ProductsAttribute::where(['product_id'=>$id])->delete();


        // Get Product Image Paths
		$large_image_path = 'images/supplierend_images/products/large/';
		$medium_image_path = 'images/supplierend_images/products/medium/';
		$small_image_path = 'images/supplierend_images/products/small/';

		// Delete Large Image if  exists in Folder
        if(file_exists($large_image_path.$productImage->image)){
            unlink($large_image_path.$productImage->image);
        }

        // Delete Medium Image if  exists in Folder
        if(file_exists($medium_image_path.$productImage->image)){
            unlink($medium_image_path.$productImage->image);
        }

        // Delete Small Image if exists in Folder
        if(file_exists($small_image_path.$productImage->image)){
            unlink($small_image_path.$productImage->image);
        }
        $productImage = ProductsImage::where('product_id',$id)->first();
        // Get Product Image Paths
        $large_image_path = 'images/supplierend_images/products/large/';
        $medium_image_path = 'images/supplierend_images/products/medium/';
        $small_image_path = 'images/supplierend_images/products/small/';

        // Delete Large Image if not exists in Folder
        if(file_exists($large_image_path.$productImage->image)){
            unlink($large_image_path.$productImage->image);
        }

        // Delete Medium Image if not exists in Folder
        if(file_exists($medium_image_path.$productImage->image)){
            unlink($medium_image_path.$productImage->image);
        }

        // Delete Small Image if not exists in Folder
        if(file_exists($small_image_path.$productImage->image)){
            unlink($small_image_path.$productImage->image);
        }
        ProductsImage::where(['product_id'=>$id])->delete();

        return redirect()->back()->with('flash_message_success', 'Product has been deleted successfully');
    }
    public function viewProductsSupplier(){

        $supplierDetails = Supplier::where(['email'=>Session::get('supplierSession')])->first();

         $products = Product::where(['supplier_id'=>$supplierDetails->id])->orderBy('id','Desc')->get();
         $products = json_decode(json_encode($products));
         foreach($products as $key => $val){
             $category_name = Category::where(['id'=>$val->category_id])->first();
             $products[$key]->category_name = $category_name->name;
         }
        //     //echo "<pre>"; print_r($products); die;

        return view('supplier.products.view_products')->with(compact('products','supplierDetails'));
    }



    public function deleteProductImageSupplier($id=null){
		// Get Product Image
		$productImage = Product::where('id',$id)->first();

        $supplierDetails = Supplier::where(['email'=>Session::get('supplierSession')])->first();
        $productDetails = Product::where(['id'=>$id])->first();

        if($supplierDetails->id!=$productDetails->supplier_id){
         $products = Product::where(['supplier_id'=>$supplierDetails->id])->orderBy('id','Desc')->get();
            return view('supplier.products.view_products')->with(compact('products','supplierDetails'));
        }
		// Get Product Image Paths
		$large_image_path = 'images/supplierend_images/products/large/';
		$medium_image_path = 'images/supplierend_images/products/medium/';
		$small_image_path = 'images/supplierend_images/products/small/';

		// Delete Large Image if not exists in Folder
        if(file_exists($large_image_path.$productImage->image)){
            unlink($large_image_path.$productImage->image);
        }

        // Delete Medium Image if not exists in Folder
        if(file_exists($medium_image_path.$productImage->image)){
            unlink($medium_image_path.$productImage->image);
        }

        // Delete Small Image if not exists in Folder
        if(file_exists($small_image_path.$productImage->image)){
            unlink($small_image_path.$productImage->image);
        }

        // Delete Image from Products table
        Product::where(['id'=>$id])->update(['image'=>'']);

        return redirect()->back()->with('flash_message_success', 'Product image has been deleted successfully');
	}
    public function deleteAltImageSupplier($id=null){
		// Get Product Image
        $productImage = ProductsImage::where('id',$id)->first();

        // Get Product Image Paths
        $large_image_path = 'images/supplierend_images/products/large/';
        $medium_image_path = 'images/supplierend_images/products/medium/';
        $small_image_path = 'images/supplierend_images/products/small/';

        // Delete Large Image if not exists in Folder
        if(file_exists($large_image_path.$productImage->image)){
            unlink($large_image_path.$productImage->image);
        }

        // Delete Medium Image if not exists in Folder
        if(file_exists($medium_image_path.$productImage->image)){
            unlink($medium_image_path.$productImage->image);
        }

        // Delete Small Image if not exists in Folder
        if(file_exists($small_image_path.$productImage->image)){
            unlink($small_image_path.$productImage->image);
        }

        // Delete Image from Products Images table
        ProductsImage::where(['id'=>$id])->delete();

        return redirect()->back()->with('flash_message_success', 'Product alternate image(s) has been deleted successfully');
    }

    public function deleteProductVideoSupplier($id){
        if (Session::get('adminDetails')['products_access']==0){
            return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
        }
        // Get Video Name
        $productVideo = Product::select('video')->where('id',$id)->first();

        // Get Video Path
        $video_path = 'videos/';

        // Delete Video if exists in videos folder
        if(file_exists($video_path.$productVideo->video)){
            unlink($video_path.$productVideo->video);
        }

        // Delete Video from Products table
        Product::where('id',$id)->update(['video'=>'']);

        return redirect()->back()->with('flash_message_success','Product Video has been deleted successfully');
    }

    public function addAttributesSupplier(Request $request, $id=null){
         $productDetails = Product::with('attributes')->where(['id' => $id])->first();

         //echo "a";die;
         //$productDetails = json_decode(json_encode($productDetails));
         //echo "<pre>"; print_r($productDetails); die;
         //$categoryDetails = Category::where(['id'=>$productDetails->category_id])->first();
         //$category_name = $categoryDetails->name;
         if($request->isMethod('post')){
             $data = $request->all();
              //  echo "<pre>"; print_r($data); die;
             foreach($data['sku'] as $key => $val){
                 //Sku check preveting duplicate
                 if(!empty($val)){
                       $attrCountSKU = ProductsAttribute::where(['sku'=>$val])->count();
                     if($attrCountSKU>0){
                         return redirect('supplier/add-attributes/'.$id)->with('flash_message_error', 'SKU already exists. Please add another SKU.');
                     }
                     //size check preventing duplicate
                       $attrCountSizes = ProductsAttribute::where(['product_id'=>$id,'size'=>$data['size'][$key]])->count();
                       if($attrCountSizes>0){
                        return redirect('supplier/add-attributes/'.$id)->with('flash_message_error',
                         '"'.$data['size'][$key].'" Size already exists. Please add another Attribute.');
                       }
                     $attr=new ProductsAttribute;
                        $attr->product_id = $id;
                        $attr->sku = $val;
                        $attr->size = $data['size'][$key];
                        $attr->price = $data['price'][$key];
                        $attr->stock = $data['stock'][$key];
                        $attr->save();
                   }
                }
             return redirect('supplier/add-attributes/'.$id)->with('flash_message_success', 'Product Attributes has been added successfully');
           }
        // $title = "Add Attributes";
        //->with(compact('title','productDetails','category_name'))
        $supplierDetails = Supplier::where(['email'=>Session::get('supplierSession')])->first();

        return view('supplier.products.add_attributes')->with(compact('productDetails','supplierDetails'));
    }
    public function editAttributesSupplier(Request $request, $id=null){

        if($request->isMethod('post')){
            $data = $request->all();
            /*echo "<pre>"; print_r($data); die;*/
            foreach($data['idAttr'] as $key=> $attr){
                if(!empty($attr)){
                    ProductsAttribute::where(['id' => $data['idAttr'][$key]])
                    ->update(['price' => $data['price'][$key], 'stock' => $data['stock'][$key]]);
                }
            }
            return redirect('supplier/add-attributes/'.$id)->with('flash_message_success', 'Product Attributes has been updated successfully');
        }
    }
    public function deleteAttributeSupplier($id = null){
        ProductsAttribute::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Product Attribute has been deleted successfully');
    }
    public function addImagesSupplier(Request $request, $id=null){
        $productDetails = Product::with('attributes')->where(['id' => $id])->first();

        if($request->isMethod('post')){
            $data = $request->all();
            if ($request->hasFile('image')) {
                $files = $request->file('image');

                foreach($files as $file){
                    // Upload Images after Resize
                    $image = new ProductsImage;
                    $extension = $file->getClientOriginalExtension();
                    $fileName = rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/supplierend_images/products/large'.'/'.$fileName;
                    $medium_image_path = 'images/supplierend_images/products/medium'.'/'.$fileName;
                    $small_image_path = 'images/supplierend_images/products/small'.'/'.$fileName;
                    Image::make($file)->save($large_image_path);
                    Image::make($file)->resize(600, 600)->save($medium_image_path);
                    Image::make($file)->resize(300, 300)->save($small_image_path);
                    $image->image = $fileName;
                    $image->product_id = $data['product_id'];
                    $image->save();
                }
            }
                return redirect('supplier/add-images/'.$id)->with('flash_message_success', 'Product Images has been added successfully');

        }

        $productImages = ProductsImage::where(['product_id' => $id])->orderBy('id','DESC')->get();
        $title = "Add Images";
        $supplierDetails = Supplier::where(['email'=>Session::get('supplierSession')])->first();

       return view('supplier.products.add_images')->with(compact('productDetails','productImages','supplierDetails'));
   }

    public function viewStore($id=null){


        $productsAll = Product::whereHas('supplier', function ($query) {
            $query->where('active', '=', '1');
        })->where('status',1)->paginate(12);

        $supplierDetails = Supplier::where(['id'=>$id])->first();
        // echo "$supplierDetails";die;
         $products = Product::with('supplier')->where('status',1)->get();
        $categories = Category::with('categories')->where(['parent_id' => 0])->get();
        $categories_menu = "";

		$banners = Banner::where(['status'=>'1','supplier_id'=>$id])->get();
        // echo "$banners";
        return view('products.view_store')->with(compact('banners','supplierDetails','productsAll','products','categories','categories_menu'));

    }


     ////////////ADMIN////////////
    public function addProduct(Request $request){

        if (Session::get('adminDetails')['products_access']==0){
            return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
        }
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
    	 			$large_image_path = 'images/supplierend_images/products/large/'.$filename;
    	 			$medium_image_path = 'images/supplierend_images/products/medium/'.$filename;
    	 			$small_image_path = 'images/supplierend_images/products/small/'.$filename;
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
    	 	$product->save();
    	 	//return redirect()->back()->with('flash_message_success','Product has been added successfully!');
                return redirect('/admin/view-products')->with('flash_message_success','Product has been added successfully!');
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

         return view('admin.products.add_product')->with(compact('categories_dropdown','sleeveArray','patternArray'));
        //return view('admin.products.add_product');
    }
  //  //===================================================================================//
  //  //===================================================================================//
   // //===================================================================================//
   // //===================================================================================//
    public function editProduct(Request $request,$id=null){

        if (Session::get('adminDetails')['products_access']==0){
            return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
        }

		if($request->isMethod('post')){
			$data = $request->all();
			//echo "<pre>"; print_r($data); die;

            if(empty($data['status'])){
                $status='0';
            }else{
                $status='1';
            }
            if(empty($data['feature_item'])){
                $feature_item='0';
            }else{
                $feature_item='1';
            }

            if(!empty($data['sleeve'])){
                $sleeve = $data['sleeve'];
            }else{
                $sleeve = '';
            }

            if(!empty($data['pattern'])){
                $pattern = $data['pattern'];
            }else{
                $pattern = '';
            }

			// Upload Image
            if($request->hasFile('image')){
            	$image_tmp = Input::file('image');
                if ($image_tmp->isValid()) {
                    // Upload Images after Resize
                    $extension = $image_tmp->getClientOriginalExtension();
	                $fileName = rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/supplierend_images/products/large'.'/'.$fileName;
                    $medium_image_path = 'images/supplierend_images/products/medium'.'/'.$fileName;
                    $small_image_path = 'images/supplierend_images/products/small'.'/'.$fileName;

	                Image::make($image_tmp)->save($large_image_path);
 					Image::make($image_tmp)->resize(600, 600)->save($medium_image_path);
     				Image::make($image_tmp)->resize(300, 300)->save($small_image_path);

                }
            }else if(!empty($data['current_image'])){
            	$fileName = $data['current_image'];
            }else{
            	$fileName = '';
            }

            // Upload Video
            if($request->hasFile('video')){
                $video_tmp = Input::file('video');
                $video_name = $video_tmp->getClientOriginalName();
                $video_path = 'videos/';
                $video_tmp->move($video_path,$video_name);
                $videoName = $video_name;
            }else if(!empty($data['current_video'])){
                $videoName = $data['current_video'];
            }else{
                $videoName = '';
            }


            if(empty($data['description'])){
            	$data['description'] = '';
            }

            if(empty($data['care'])){
                $data['care'] = '';
            }
            //
            //
            Product::where(['id'=>$id])->update(['feature_item'=>$feature_item,'category_id'=>$data['category_id'],
            'product_name'=>$data['product_name'],'status'=>$status,
                'product_code'=>$data['product_code'],'product_color'=>$data['product_color'],
                'description'=>$data['description'],'care'=>$data['care'],'price'=>$data['price'],
                'image'=>$fileName,'video'=>$videoName,'sleeve'=>$sleeve,'pattern'=>$pattern]);

			return redirect()->back()->with('flash_message_success', 'Product has been edited successfully');
		}

		// Get Product Details start //
		$productDetails = Product::where(['id'=>$id])->first();
		// Get Product Details End //

		// Categories drop down start //
		$categories = Category::where(['parent_id' => 0])->get();

		$categories_drop_down = "<option value='' disabled>Select</option>";
		foreach($categories as $cat){
			if($cat->id==$productDetails->category_id){
				$selected = "selected";
			}else{
				$selected = "";
			}
			$categories_drop_down .= "<option value='".$cat->id."' ".$selected.">".$cat->name."</option>";
			$sub_categories = Category::where(['parent_id' => $cat->id])->get();
			foreach($sub_categories as $sub_cat){
				if($sub_cat->id==$productDetails->category_id){
					$selected = "selected";
				}else{
					$selected = "";
				}
				$categories_drop_down .= "<option value='".$sub_cat->id."' ".$selected.">&nbsp;&nbsp;--&nbsp;".$sub_cat->name."</option>";
			}
		}
        // Categories drop down end //

        $sleeveArray = array('Full Sleeve','Half Sleeve','Short Sleeve','Sleeveless');
        $patternArray = array('Checked','Plain','Printed','Self','Solid');


		return view('admin.products.edit_product')->with(compact('productDetails','categories_drop_down','sleeveArray','patternArray' ));
	}

    //================================================================================
    //================================================================================
    //================================================================================
    //================================================================================
    //================================================================================
	public function deleteProductImage($id=null){
        if (Session::get('adminDetails')['products_access']==0){
            return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
        }
		// Get Product Image
		$productImage = Product::where('id',$id)->first();

		// Get Product Image Paths
		$large_image_path = 'images/supplierend_images/products/large/';
		$medium_image_path = 'images/supplierend_images/products/medium/';
		$small_image_path = 'images/supplierend_images/products/small/';

		// Delete Large Image if not exists in Folder
        if(file_exists($large_image_path.$productImage->image)){
            unlink($large_image_path.$productImage->image);
        }

        // Delete Medium Image if not exists in Folder
        if(file_exists($medium_image_path.$productImage->image)){
            unlink($medium_image_path.$productImage->image);
        }

        // Delete Small Image if not exists in Folder
        if(file_exists($small_image_path.$productImage->image)){
            unlink($small_image_path.$productImage->image);
        }

        // Delete Image from Products table
        Product::where(['id'=>$id])->update(['image'=>'']);

        return redirect()->back()->with('flash_message_success', 'Product image has been deleted successfully');
	}
    public function deleteAltImage($id=null){
        if (Session::get('adminDetails')['products_access']==0){
            return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
        }
		// Get Product Image
        $productImage = ProductsImage::where('id',$id)->first();

        // Get Product Image Paths
        $large_image_path = 'images/supplierend_images/products/large/';
        $medium_image_path = 'images/supplierend_images/products/medium/';
        $small_image_path = 'images/supplierend_images/products/small/';

        // Delete Large Image if not exists in Folder
        if(file_exists($large_image_path.$productImage->image)){
            unlink($large_image_path.$productImage->image);
        }

        // Delete Medium Image if not exists in Folder
        if(file_exists($medium_image_path.$productImage->image)){
            unlink($medium_image_path.$productImage->image);
        }

        // Delete Small Image if not exists in Folder
        if(file_exists($small_image_path.$productImage->image)){
            unlink($small_image_path.$productImage->image);
        }

        // Delete Image from Products Images table
        ProductsImage::where(['id'=>$id])->delete();

        return redirect()->back()->with('flash_message_success', 'Product alternate image(s) has been deleted successfully');
    }
    //================================================================================
    //================================================================================
    public function deleteProduct($id = null){
        if (Session::get('adminDetails')['products_access']==0){
            return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
        }
        Product::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Product has been deleted successfully');
    }
    //================================================================================
    //================================================================================
    //================================================================================
    public function viewProducts(){
        if (Session::get('adminDetails')['products_access']==0){
            return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
        }
         $products = Product::orderBy('id','Desc')->get();
         $products = json_decode(json_encode($products));
         foreach($products as $key => $val){
             $category_name = Category::where(['id'=>$val->category_id])->first();
             $products[$key]->category_name = $category_name->name;
         }
        //     //echo "<pre>"; print_r($products); die;
          return view('admin.products.view_products')->with(compact('products'));
    }
    //================================================================================
    //================================================================================
    public function deleteAttribute($id = null){
        if (Session::get('adminDetails')['products_access']==0){
            return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
        }
        ProductsAttribute::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Product Attribute has been deleted successfully');
    }
    //================================================================================
    //================================================================================
    public function addAttributes(Request $request, $id=null){
        if (Session::get('adminDetails')['products_access']==0){
            return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
        }

         $productDetails = Product::with('attributes')->where(['id' => $id])->first();
         //$productDetails = json_decode(json_encode($productDetails));
         //echo "<pre>"; print_r($productDetails); die;
         //$categoryDetails = Category::where(['id'=>$productDetails->category_id])->first();
         //$category_name = $categoryDetails->name;
         if($request->isMethod('post')){
             $data = $request->all();
         //        echo "<pre>"; print_r($data); die;
             foreach($data['sku'] as $key => $val){
                 //Sku check preveting duplicate
                 if(!empty($val)){
                       $attrCountSKU = ProductsAttribute::where(['sku'=>$val])->count();
                     if($attrCountSKU>0){
                         return redirect('admin/add-attributes/'.$id)->with('flash_message_error', 'SKU already exists. Please add another SKU.');
                     }
                     //size check preventing duplicate
                       $attrCountSizes = ProductsAttribute::where(['product_id'=>$id,'size'=>$data['size'][$key]])->count();
                       if($attrCountSizes>0){
                        return redirect('admin/add-attributes/'.$id)->with('flash_message_error',
                         '"'.$data['size'][$key].'" Size already exists. Please add another Attribute.');
                       }
                     $attr=new ProductsAttribute;
                        $attr->product_id = $id;
                        $attr->sku = $val;
                        $attr->size = $data['size'][$key];
                        $attr->price = $data['price'][$key];
                        $attr->stock = $data['stock'][$key];
                        $attr->save();
                   }
                }
             return redirect('admin/add-attributes/'.$id)->with('flash_message_success', 'Product Attributes has been added successfully');
           }
        // $title = "Add Attributes";
        //->with(compact('title','productDetails','category_name'))
        return view('admin.products.add_attributes')->with(compact('productDetails'));
    }
    public function addImages(Request $request, $id=null){
        if (Session::get('adminDetails')['products_access']==0){
            return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
        }

        $productDetails = Product::with('attributes')->where(['id' => $id])->first();

        if($request->isMethod('post')){
            $data = $request->all();
            if ($request->hasFile('image')) {
                $files = $request->file('image');

                foreach($files as $file){
                    // Upload Images after Resize
                    $image = new ProductsImage;
                    $extension = $file->getClientOriginalExtension();
                    $fileName = rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/supplierend_images/products/large'.'/'.$fileName;
                    $medium_image_path = 'images/supplierend_images/products/medium'.'/'.$fileName;
                    $small_image_path = 'images/supplierend_images/products/small'.'/'.$fileName;
                    Image::make($file)->save($large_image_path);
                    Image::make($file)->resize(600, 600)->save($medium_image_path);
                    Image::make($file)->resize(300, 300)->save($small_image_path);
                    $image->image = $fileName;
                    $image->product_id = $data['product_id'];
                    $image->save();
                }
            }
                return redirect('admin/add-images/'.$id)->with('flash_message_success', 'Product Images has been added successfully');

        }

        $productImages = ProductsImage::where(['product_id' => $id])->orderBy('id','DESC')->get();
        $title = "Add Images";
       return view('admin.products.add_images')->with(compact('productDetails','productImages'));
   }
    //================================================================================
    //================================================================================
    public function editAttributes(Request $request, $id=null){
        if (Session::get('adminDetails')['products_access']==0){
            return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
        }
        if($request->isMethod('post')){
            $data = $request->all();
            /*echo "<pre>"; print_r($data); die;*/
            foreach($data['idAttr'] as $key=> $attr){
                if(!empty($attr)){
                    ProductsAttribute::where(['id' => $data['idAttr'][$key]])
                    ->update(['price' => $data['price'][$key], 'stock' => $data['stock'][$key]]);
                }
            }
            return redirect('admin/add-attributes/'.$id)->with('flash_message_success', 'Product Attributes has been updated successfully');
        }
    }
   //================================================================================
    //================================================================================
    //================================================================================
    //================================================================================
    //================================================================================
    public function products($url=null){

        // Show 404 Page if Category does not exists
        //,'status'=>1
    	 $categoryCount = Category::where(['url'=>$url,'status'=>1])->count();
    	 if($categoryCount==0){
    	 	abort(404);
    	 }

    	   $categories = Category::with('categories')->where(['parent_id' => 0])->get();

    	    $categoryDetails = Category::where(['url'=>$url])->first();
    	    if($categoryDetails->parent_id==0){
    	 	    $subCategories = Category::where(['parent_id'=>$categoryDetails->id])->get();
    	    	$subCategories = json_decode(json_encode($subCategories));
    	 	    foreach($subCategories as $subcat){
    	 		    $cat_ids[] = $subcat->id;
    	 	    }
                $productsAll = Product::whereIn('products.category_id', $cat_ids)->where('status',1)->
                    orderBy('products.id','desc');
                    $breadcrumb = "<a href='/project1/public/'>Home</a> / <a href='".$categoryDetails->url."'>".$categoryDetails->name."</a>";

    	   }else{
            //->where('status','1')
                $productsAll = Product::where(['products.category_id'=>$categoryDetails->id])->where('status',1)
                    ->orderBy('products.id','desc');
                    $mainCategory = Category::where('id',$categoryDetails->parent_id)->first();
                    $breadcrumb = "<a href='/project1/public/'>Home</a> / <a href='".$mainCategory->url."'>".$mainCategory->name."</a> / <a href='".$categoryDetails->url."'>".$categoryDetails->name."</a>";

           }

           if(!empty($_GET['color'])){
            $colorArray = explode('-',$_GET['color']);
            $productsAll = $productsAll->whereIn('products.product_color',$colorArray);
           }

           if(!empty($_GET['sleeve'])){
            $sleeveArray = explode('-',$_GET['sleeve']);
            $productsAll = $productsAll->whereIn('products.sleeve',$sleeveArray);
           }

            if(!empty($_GET['pattern'])){
                $patternArray = explode('-',$_GET['pattern']);
                $productsAll = $productsAll->whereIn('products.pattern',$patternArray);
            }
            if(!empty($_GET['size'])){
                $sizeArray = explode('-',$_GET['size']);
                $productsAll = $productsAll->join('products_attributes','products_attributes.product_id','=','products.id')
                ->select('products.*','products_attributes.product_id','products_attributes.size')
                ->groupBy('products_attributes.product_id')
                ->whereIn('products_attributes.size',$sizeArray);
            }

    		$banners = Banner::where('status','1')->get();

           $productsAll = $productsAll->paginate(6);

           $colorArray = Product::select('product_color')->groupBy('product_color')->get();
           $colorArray = array_flatten(json_decode(json_encode($colorArray),true));

           $sleeveArray = Product::select('sleeve')->where('sleeve','!=','')->groupBy('sleeve')->get();
           $sleeveArray = array_flatten(json_decode(json_encode($sleeveArray),true));

            $patternArray = Product::select('pattern')->where('pattern','!=','')->groupBy('pattern')->get();
            $patternArray = array_flatten(json_decode(json_encode($patternArray),true));

            $sizesArray = ProductsAttribute::select('size')->groupBy('size')->get();
        $sizesArray = array_flatten(json_decode(json_encode($sizesArray),true));

           $meta_title = $categoryDetails->meta_title;
           $meta_description = $categoryDetails->meta_description;
           $meta_keywords = $categoryDetails->meta_keywords;
         return view('products.listing')->with(compact('categories','productsAll',
         'categoryDetails','meta_title','meta_description','meta_keywords','url','colorArray',
         'sleeveArray','patternArray','banners','sizesArray','breadcrumb'));

    }

    public function product($id = null){  //product id
        // Show 404 Page if Product is disabled
        $productCount = Product::where(['id'=>$id,'status'=>1])->count();
        if($productCount==0){
           abort(404);
        }
        // Get Product Details
        $productDetails = Product::with('attributes')->where('id',$id)->first();
        // echo $productDetails->supplier_id;die;
        $supplierDetails = Supplier::where('id',$productDetails->supplier_id)->first();
        // echo $supplierDetails;die;
        $factoryDetails = Factory::where('id',$productDetails->factory_id)->first();
        //  echo $factoryDetails;die;
        $relatedProducts = Product::where('id','!=',$id)->where(['category_id' => $productDetails->category_id])->get();
        // Get Product Alt Images
        $productAltImages = ProductsImage::where('product_id',$id)->get();
        /*$productAltImages = json_decode(json_encode($productAltImages));
        echo "<pre>"; print_r($productAltImages); die;*/
        $categories = Category::with('categories')->where(['parent_id' => 0])->get();

        $categoryDetails = Category::where('id',$productDetails->category_id)->first();
        if($categoryDetails->parent_id==0){
            $breadcrumb = "<a style='color:black;' href='/'>Home</a> / <a href='".$categoryDetails->url."'>".
            $categoryDetails->name."</a> / ".$productDetails->product_name;
        }else{
            $mainCategory = Category::where('id',$categoryDetails->parent_id)->first();
            $breadcrumb = "<a style='color:black;' href='/project1/public/'>Home</a> / <a style='color:black;'
            href='/project1/public/products/".$mainCategory->url."'>".$mainCategory->name."</a> / <a style='color:black;'
            href='/project1/public/products/".$categoryDetails->url."'>".$categoryDetails->name."</a> / ".$productDetails->product_name;
        }

        $total_stock = ProductsAttribute::where('product_id',$id)->sum('stock');

        $banners = Banner::where('status','1')->get();
        $reviews = Review::where('product_id',$id)->get();
        $users = User::get();

        //   echo "<pre>"; print_r($users); die;


        // default varaibles
        $background_img="";
        $main_color="";
        $secondary_color="";
        $store_name_color="";
        $outlet_name="";
        $outlet_title="";

        if ($supplierDetails!=null) {
            $background_img=$supplierDetails->background_img;
            $main_color=$supplierDetails->main_color;
            $secondary_color=$supplierDetails->secondary_color;
            $store_name_color=$supplierDetails->store_name_color;
            $outlet_name=$supplierDetails->store_name;
            $outlet_title="Store Name:";
            $outlet_id=$supplierDetails->id;
            $store=true;
            $factory=false;
            $theme_id=$supplierDetails->theme_id;

        }else
        {
            $background_img=$factoryDetails->background_img;
            $main_color=$factoryDetails->main_color;
            $secondary_color=$factoryDetails->secondary_color;
            $store_name_color=$factoryDetails->factorystore_name_color;
            $outlet_name=$factoryDetails->factory_name;
            $outlet_title="Factory Name:";
            $outlet_id=$factoryDetails->id;
            $store=false;
            $factory=true;
            $theme_id=$factoryDetails->theme_id;

        }
        $meta_title = $productDetails->product_name;
        $meta_description = $productDetails->description;
        $meta_keywords = $productDetails->product_name;

        //creviews
        if(empty(Session::has('frontSession'))){
            $commented=true;
        }else{
            $user = User::where(['email'=>Session::get('frontSession')])->first();

            // echo $user->id;
            // echo "<pre>"; print_r($user); die;
            $commented=false;

            foreach ($reviews as $key => $review) {
                if ($review->user_id==$user->id) {
                    $commented=true;
                    // echo "hey";
                }
            }
        }
            $user = User::where(['email'=>Session::get('frontSession')])->first();

        return view('products.detail_'.$theme_id)->with(compact('productDetails','relatedProducts','categories','supplierDetails'
        ,'productAltImages','total_stock','meta_title','meta_description','meta_keywords','banners','breadcrumb'
        ,'background_img','main_color','secondary_color','store_name_color','outlet_name','outlet_title'
        ,'outlet_id','store','factory','reviews','users','user','commented'));
    }

    public function getProductPrice(Request $request){
        $data = $request->all();
        $proArr = explode("-",$data['idsize']);
        $proAttr = ProductsAttribute::where(['product_id'=>$proArr[0],'size'=>$proArr[1]])->first();
        echo $proAttr->price;
        echo "#";
        echo $proAttr->stock;
    }

    public function addtocart(Request $request){

        Session::forget('CouponAmount');
        Session::forget('CouponCode');
        $data = $request->all();
        $data['user_email'] = Auth::user()->email;

        // echo "<pre>"; print_r($data); die;

        $product_size = explode("-",$data['size']);
        $getProductStock = ProductsAttribute::where(['product_id'=>$data['product_id'],'size'=>$product_size[1]])->first();

        if($getProductStock->stock<$data['quantity']){
            return redirect()->back()->with('flash_message_error','Required Quantity is not available!');
        }

        if(empty($data['user_email'])){
            $data['user_email'] = '';
        }
        if(empty($data['session_id'])){
            $data['session_id'] = '';
        }

        $session_id = Session::get('session_id');
        if(!isset($session_id)){
            $session_id = str_random(40);
            Session::put('session_id',$session_id);
        }
        $sizeArr = explode('-',$data['size']);

         $countProducts = DB::table('cart')->where(['product_id' => $data['product_id'],
         'product_color' => $data['product_color'],'size' => $sizeArr[1],'session_id' => $session_id])
         ->count();
         if($countProducts>0){
             return redirect()->back()->with('flash_message_error','Product already exist in Cart!');
         }else{
            $getSKU = ProductsAttribute::select('sku')->where(['product_id' => $data['product_id'], 'size' => $sizeArr[1]])->first();

            DB::table('cart')
            ->insert(['product_id' => $data['product_id'],'product_name' => $data['product_name'],
                'product_code' => $getSKU->sku,'product_color' => $data['product_color'],
                'price' => $data['price'],'size' => $sizeArr[1],'quantity' => $data['quantity'],
                'user_email' => $data['user_email'],'session_id' => $session_id]);
         }
        return redirect('cart')->with('flash_message_success','Product has been added in Cart!');

    }
    public function addtowishlist(Request $request){

        $data = $request->all();
        $data['user_email'] = Auth::user()->email;


        if(empty($data['user_email'])){
            $data['user_email'] = '';
        }
            DB::table('wishlist')
            ->insert(['product_id' => $data['product_id'],'product_name' => $data['product_name'],
                'price' => $data['price'],
                'user_email' => $data['user_email']]);

        return redirect('wishlist')->with('flash_message_success','Product has been added in Wish List!');

    }
    public function cart(){
        //$session_id = Session::get('session_id');
        //$user_email=Auth::user()->email;
        //$userCart = DB::table('cart')->where(['session_id' => $session_id,'user_email' => $user_email])->get();
        //or
        if (Auth::check()) {
            $user_email=Auth::user()->email;
            $userCart = DB::table('cart')->where(['user_email' => $user_email])->get();
        }else{
            $session_id = Session::get('session_id');
            $userCart = DB::table('cart')->where(['session_id' => $session_id])->get();
        }

        foreach($userCart as $key => $product){
            $productDetails = Product::where('id',$product->product_id)->first();
            $userCart[$key]->image = $productDetails->image;
        }


        // /*echo "<pre>"; print_r($userCart); die;*/
        $meta_title = "Shopping Cart - HUBZUH Website";
        $meta_description = "View Shopping Cart of HUBZUH Online Store Website";
        $meta_keywords = "shopping cart, HUBZUH Website , e commerce, online Store";
       return view('products.cart')->with(compact('userCart','meta_title','meta_description','meta_keywords'));
        // return view('products.cart');

    }
    public function wishlist(){
        if (Auth::check()) {
            $user_email=Auth::user()->email;
            $userwishlist = DB::table('wishlist')->where(['user_email' => $user_email])->get();
        }

        foreach($userwishlist as $key => $product){
            $productDetails = Product::where('id',$product->product_id)->first();
            $userwishlist[$key]->image = $productDetails->image;
        }

        $meta_title = "Wish List - HUBZUH Website";
        $meta_description = "View Wish List of HUBZUH Online Store Website";
        $meta_keywords = "Wish List, HUBZUH Website , e commerce, online Store";
       return view('products.wishlist')->with(compact('userwishlist','meta_title','meta_description','meta_keywords'));

    }

    public function deleteCartProduct($id=null){
        Session::forget('CouponAmount');
        Session::forget('CouponCode');
        DB::table('cart')->where('id',$id)->delete();
        return redirect('cart')->with('flash_message_success','Product has been deleted in Cart!');
    }
    public function deleteWishListProduct($id=null){
        DB::table('wishlist')->where('id',$id)->delete();
        return redirect('wishlist')->with('flash_message_success','Product has been Deleted from Wish List!');
    }

    public function updateCartQuantity($id=null,$quantity=null){
        Session::forget('CouponAmount');
        Session::forget('CouponCode');
         $getProductSKU = DB::table('cart')->select('product_code','quantity')->where('id',$id)->first();
         $getProductStock = ProductsAttribute::where('sku',$getProductSKU->product_code)->first();
         $updated_quantity = $getProductSKU->quantity+$quantity;
        if($getProductStock->stock>=$updated_quantity){
            DB::table('cart')->where('id',$id)->increment('quantity',$quantity);
            return redirect('cart')->with('flash_message_success','Product Quantity has been updated in Cart!');
        }else{
            return redirect('cart')->with('flash_message_error','Required Product Quantity is not available!');
        }
    }

    public function applyCoupon(Request $request){

        Session::forget('CouponAmount');
        Session::forget('CouponCode');

        $data = $request->all();
        /*echo "<pre>"; print_r($data); die;*/
        $couponCount = Coupon::where('coupon_code',$data['coupon_code'])->count();
        if($couponCount == 0){
            return redirect()->back()->with('flash_message_error','This coupon does not exists!');
        }else{
            // with perform other checks like Active/Inactive, Expiry date..

            // Get Coupon Details
            $couponDetails = Coupon::where('coupon_code',$data['coupon_code'])->first();

            // If coupon is Inactive
            if($couponDetails->status==0){
                return redirect()->back()->with('flash_message_error','This coupon is not active!');
            }

            // If coupon is Expired
            $expiry_date = $couponDetails->expiry_date;
            $current_date = date('Y-m-d');
            if($expiry_date < $current_date){
                return redirect()->back()->with('flash_message_error','This coupon is expired!');
            }

            // Coupon is Valid for Discount

            // Get Cart Total Amount
            $session_id = Session::get('session_id');
            // $userCart = DB::table('cart')->where(['session_id' => $session_id])->get();

            if (Auth::check()) {
                $user_email=Auth::user()->email;
                $userCart = DB::table('cart')->where(['user_email' => $user_email])->get();
            }else{
                $session_id = Session::get('session_id');
                $userCart = DB::table('cart')->where(['session_id' => $session_id])->get();
            }

            $total_amount = 0;
            foreach($userCart as $item){
               $total_amount = $total_amount + ($item->price * $item->quantity);
            }

            // Check if amount type is Fixed or Percentage
            if($couponDetails->amount_type=="Fixed"){
                $couponAmount = $couponDetails->amount;
            }else{
                $couponAmount = $total_amount * ($couponDetails->amount/100);
            }

            // Add Coupon Code & Amount in Session
            Session::put('CouponAmount',$couponAmount);
            Session::put('CouponCode',$data['coupon_code']);

            return redirect()->back()->with('flash_message_success','Coupon code successfully
                applied. You are availing discount!');

        }
    }

    public function checkout(Request $request){
        $user_id = Auth::user()->id;
        $user_email = Auth::user()->email;
        $userDetails = User::find($user_id);
        $countries = Country::get();

        //Check if Shipping Address exists
        $shippingCount = DeliveryAddress::where('user_id',$user_id)->count();
        $shippingDetails = array();
        if($shippingCount>0){
            $shippingDetails = DeliveryAddress::where('user_id',$user_id)->first();
        }

        // Update cart table with user email
        $session_id = Session::get('session_id');
        //DB::table('cart')->where(['session_id'=>$session_id])->update(['user_email'=>$user_email]);
        if($request->isMethod('post')){
            $data = $request->all();
            /*echo "<pre>"; print_r($data); die;*/
            // Return to Checkout page if any of the field is empty
            if(empty($data['billing_name']) || empty($data['billing_address']) ||
            empty($data['billing_city']) || empty($data['billing_state']) || empty($data['billing_country']) ||
            empty($data['billing_pincode']) || empty($data['billing_mobile']) || empty($data['shipping_name']) ||
            empty($data['shipping_address']) || empty($data['shipping_city']) || empty($data['shipping_state']) ||
            empty($data['shipping_country']) || empty($data['shipping_pincode']) || empty($data['shipping_mobile'])){
                    return redirect()->back()->with('flash_message_error','Please fill all fields to Checkout!');
            }

            // Update User details
            User::where('id',$user_id)->update(['name'=>$data['billing_name'],'address'=>$data['billing_address'],'city'=>$data['billing_city'],'state'=>$data['billing_state'],'pincode'=>$data['billing_pincode'],'country'=>$data['billing_country'],'mobile'=>$data['billing_mobile']]);

            if($shippingCount>0){
                // Update Shipping Address
                DeliveryAddress::where('user_id',$user_id)->update(['name'=>$data['shipping_name'],'address'=>$data['shipping_address'],'city'=>$data['shipping_city'],'state'=>$data['shipping_state'],'pincode'=>$data['shipping_pincode'],'country'=>$data['shipping_country'],'mobile'=>$data['shipping_mobile']]);
            }else{
                // Add New Shipping Address
                $shipping = new DeliveryAddress;
                $shipping->user_id = $user_id;
                $shipping->user_email = $user_email;
                $shipping->name = $data['shipping_name'];
                $shipping->address = $data['shipping_address'];
                $shipping->city = $data['shipping_city'];
                $shipping->state = $data['shipping_state'];
                $shipping->pincode = $data['shipping_pincode'];
                $shipping->country = $data['shipping_country'];
                $shipping->mobile = $data['shipping_mobile'];
                $shipping->save();
            }
            return redirect()->action('ProductsController@orderReview');
        }
        $meta_title = "Checkout - HUBZUH ONLINE STORE";
        return view('products.checkout')->with(compact('userDetails','countries','shippingDetails','meta_title'));
    }

    public function orderReview(){
        $user_id = Auth::user()->id;
        $user_email = Auth::user()->email;
        $userDetails = User::where('id',$user_id)->first();
        $shippingDetails = DeliveryAddress::where('user_id',$user_id)->first();
        $shippingDetails = json_decode(json_encode($shippingDetails));
        $userCart = DB::table('cart')->where(['user_email' => $user_email])->get();
        foreach($userCart as $key => $product){
            $productDetails = Product::where('id',$product->product_id)->first();
            $userCart[$key]->image = $productDetails->image;
        }
        /*echo "<pre>"; print_r($userCart); die;*/
        $meta_title = "Order Review - HUBZUH Website";
        return view('products.order_review')->with(compact('userDetails','shippingDetails','userCart','meta_title'));
    }

    public function placeOrder(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $user_id = Auth::user()->id;
            $user_email = Auth::user()->email;

            // Prevent Out of Stock Products from ordering
            $userCart = DB::table('cart')->where('user_email',$user_email)->get();
            foreach($userCart as $cart){

                $getAttributeCount = Product::getAttributeCount($cart->product_id,$cart->size);
                if($getAttributeCount==0){
                    Product::deleteCartProduct($cart->product_id,$user_email);
                    return redirect('/cart')->with('flash_message_error','One of the product is not available. Try again!');
                }

                $product_stock = Product::getProductStock($cart->product_id,$cart->size);
                if($product_stock==0){
                    Product::deleteCartProduct($cart->product_id,$user_email);
                    return redirect('/cart')->with('flash_message_error','We Are Sorry..Some products are Sold Out and removed from Cart. Try again!');
                }
                /*echo "Original Stock: ".$product_stock;
                echo "Demanded Stock: ".$cart->quantity; die;*/
                if($cart->quantity>$product_stock){
                    return redirect('/cart')->with('flash_message_error','Reduce Product Stock and try again.');
                }

                $product_status = Product::getProductStatus($cart->product_id);
                if($product_status==0){
                    Product::deleteCartProduct($cart->product_id,$user_email);
                    return redirect('/cart')->with('flash_message_error','Disabled product removed from Cart. Please try again!');
                }

                $getCategoryId = Product::select('category_id')->where('id',$cart->product_id)->first();
                $category_status = Product::getCategoryStatus($getCategoryId->category_id);
                if($category_status==0){
                    Product::deleteCartProduct($cart->product_id,$user_email);
                    return redirect('/cart')->with('flash_message_error','One of the product category is disabled. Please try again!');
                }

            }

            // Get Shipping Address of User
            $shippingDetails = DeliveryAddress::where(['user_email' => $user_email])->first();

            /*echo "<pre>"; print_r($data); die;*/

            if(empty(Session::get('CouponCode'))){
               $coupon_code = '';
            }else{
               $coupon_code = Session::get('CouponCode');
            }

            if(empty(Session::get('CouponAmount'))){
               $coupon_amount = '';
            }else{
               $coupon_amount = Session::get('CouponAmount');
            }
            // if(empty($data['shipping_charges'])){
            //     $data['shipping_charges'] = 0;
            // }

            $order = new Order;
            $order->user_id = $user_id;
            $order->user_email = $user_email;
            $order->name = $shippingDetails->name;
            $order->address = $shippingDetails->address;
            $order->city = $shippingDetails->city;
            $order->state = $shippingDetails->state;
            $order->pincode = $shippingDetails->pincode;
            $order->country = $shippingDetails->country;
            $order->mobile = $shippingDetails->mobile;
            $order->coupon_code = $coupon_code;
            $order->coupon_amount = $coupon_amount;
            $order->shipping_charges=0;
            $order->order_status = "New";
            $order->payment_method = $data['payment_method'];
            $order->grand_total = $data['grand_total'];
            $order->save();

            $order_id = DB::getPdo()->lastInsertId();

            $cartProducts = DB::table('cart')->where(['user_email'=>$user_email])->get();
            foreach($cartProducts as $pro){


                $product=Product::where(['id'=>$pro->product_id])->first();
                // echo "<pre>"; print_r($p); die;



                $cartPro = new OrdersProduct;
                $cartPro->order_id = $order_id;
                $cartPro->user_id = $user_id;
                $cartPro->product_id = $pro->product_id;
                $cartPro->product_code = $pro->product_code;
                $cartPro->product_name = $pro->product_name;
                $cartPro->product_color = $pro->product_color;
                $cartPro->product_size = $pro->size;
                $cartPro->product_price = $pro->price;
                $cartPro->product_qty = $pro->quantity;

                if ($product->supplier_id!=null) {
                    $outletDetails = Supplier::where(['id'=>$product->supplier_id])->first();
                    $cartPro->supplier_id=$outletDetails->id;
                    $outletname=$outletDetails->store_name;
                }
                else{
                    $outletDetails = Factory::where(['id'=>$product->factory_id])->first();
                    $cartPro->factory_id=$outletDetails->id;
                    $outletname=$outletDetails->factory_name;
                }

                $cartPro->save();


                // Reduce Stock Script Starts
                $getProductStock = ProductsAttribute::where('sku',$pro->product_code)->first();
                /*echo "Original Stock: ".$getProductStock->stock;
                echo "Stock to reduce: ".$pro->quantity;*/
                $newStock = $getProductStock->stock - $pro->quantity;
                if($newStock<0){
                    $newStock = 0;
                }
               ProductsAttribute::where('sku',$pro->product_code)->update(['stock'=>$newStock]);
                // Reduce Stock Script Ends
            }

            Session::put('order_id',$order_id);
            Session::put('grand_total',$data['grand_total']);

            if($data['payment_method']=="COD"){

                $productDetails = Order::with('orders')->where('id',$order_id)->first();
                $productDetails = json_decode(json_encode($productDetails),true);
                /*echo "<pre>"; print_r($productDetails);*/ /*die;*/

                $userDetails = User::where('id',$user_id)->first();
                $userDetails = json_decode(json_encode($userDetails),true);
                /*echo "<pre>"; print_r($userDetails); die;
                */

                // Email of order
                $email = $user_email;
                $messageData = [
                    'email' => $email,
                    'name' => $shippingDetails->name,
                    'order_id' => $order_id,
                    'productDetails' => $productDetails,
                    'userDetails' => $userDetails,
                    'outletname' => $outletname
                ];
                Mail::send('emails.order',$messageData,function($message) use($email){
                    $message->to($email)->subject('Order Placed - HUBZUH Team');
                });
                // COD - Redirect user to thanks page after saving order
                return redirect('/thanks');
            }
        }
    }

    public function thanks(Request $request){
        $user_email = Auth::user()->email;
        DB::table('cart')->where('user_email',$user_email)->delete();
        return view('products.thanks');
    }

    public function userOrders(){
        $user_id = Auth::user()->id;
        $orders = Order::with('orders')->where('user_id',$user_id)->orderBy('id','DESC')->get();
        /*$orders = json_decode(json_encode($orders));
        echo "<pre>"; print_r($orders); die;*/
        return view('orders.user_orders')->with(compact('orders'));
    }

    public function userOrderDetails($order_id){
        $user_id = Auth::user()->id;
        $orderDetails = Order::with('orders')->where('id',$order_id)->first();
        $orderDetails = json_decode(json_encode($orderDetails));
        /*echo "<pre>"; print_r($orderDetails); die;*/
        return view('orders.user_order_details')->with(compact('orderDetails'));
    }

    public function viewOrders(){
        if (Session::get('adminDetails')['orders_access']==0){
            return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
        }
        $orders = Order::with('orders')->orderBy('id','Desc')->get();
        $orders = json_decode(json_encode($orders));
        /*echo "<pre>"; print_r($orders); die;*/
        return view('admin.orders.view_orders')->with(compact('orders'));
    }

    public function viewOrderDetails($order_id){
        if (Session::get('adminDetails')['orders_access']==0){
            return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
        }
        // echo "check";die;
        $orderDetails = Order::with('orders')->where('id',$order_id)->first();
        // $orderDetails = json_decode(json_encode($orderDetails    ));
        // echo "<pre>"; print_r($orderDetails); die;
        $user_id = $orderDetails->user_id;
        // echo $user_id;die;
        $userDetails = User::where('id',$user_id)->first();
        // echo $userDetails;die;
        // $userDetails = json_decode(json_encode($userDetails));
        // echo "<pre>"; print_r($userDetails);
        return view('admin.orders.order_details')->with(compact('orderDetails','userDetails'));
    }
    public function updateOrderStatus(Request $request){
        if (Session::get('adminDetails')['orders_access']==0){
            return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
        }
        if($request->isMethod('post')){
            $data = $request->all();
            Order::where('id',$data['order_id'])->update(['order_status'=>$data['order_status']]);
            return redirect()->back()->with('flash_message_success','Order Status has been updated successfully!');
        }
    }

    public function filter(Request $request){
        $data= $request->all();

        $colorUrl="";
        if(!empty($data['colorFilter'])){
            foreach($data['colorFilter'] as $color){
                if(empty($colorUrl)){
                    $colorUrl = "&color=".$color;
                }else{
                    $colorUrl .= "-".$color;
                }
            }
        }

        $sleeveUrl="";
        if(!empty($data['sleeveFilter'])){
            foreach($data['sleeveFilter'] as $sleeve){
                if(empty($sleeveUrl)){
                    $sleeveUrl = "&sleeve=".$sleeve;
                }else{
                    $sleeveUrl .= "-".$sleeve;
                }
            }
        }
        $patternUrl="";
        if(!empty($data['patternFilter'])){
            foreach($data['patternFilter'] as $pattern){
                if(empty($patternUrl)){
                    $patternUrl = "&pattern=".$pattern;
                }else{
                    $patternUrl .= "-".$pattern;
                }
            }
        }
        $sizeUrl="";
        if(!empty($data['sizeFilter'])){
            foreach($data['sizeFilter'] as $size){
                if(empty($sizeUrl)){
                    $sizeUrl = "&size=".$size;
                }else{
                    $sizeUrl .= "-".$size;
                }
            }
        }

        //.$sleeveUrl.$patternUrl.$sizeUrl
        $finalUrl = "products/".$data['url']."?".$colorUrl.$sleeveUrl.$patternUrl.$sizeUrl;
        return redirect::to($finalUrl);
    }
    public function searchProducts(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $categories = Category::with('categories')->where(['parent_id' => 0])->get();
            $search_product = $data['search'];
            /*$productsAll = Product::where('product_name','like','%'.$search_product.'%')->orwhere('product_code',$search_product)->where('status',1)->paginate();*/

            $productsAll = Product::where(function($query) use($search_product){
                $query->where('product_name','like','%'.$search_product.'%')
                ->orWhere('product_code','like','%'.$search_product.'%')
                ->orWhere('description','like','%'.$search_product.'%')
                ->orWhere('product_color','like','%'.$search_product.'%');
            })->where('status',1)->get();

    		$banners = Banner::where('status','1')->get();

            $breadcrumb = "<a href='/project1/public'>Home</a> / ".$search_product;

            return view('products.listing')->with(compact('categories','productsAll','search_product','breadcrumb','banners'));
        }
    }


    public function viewOrderInvoice($order_id){
        if (Session::get('adminDetails')['orders_access']==0){
            return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
        }
        $orderDetails = Order::with('orders')->where('id',$order_id)->first();
        $orderDetails = json_decode(json_encode($orderDetails));
        /*echo "<pre>"; print_r($orderDetails); die;*/
        $user_id = $orderDetails->user_id;
        $userDetails = User::where('id',$user_id)->first();
        /*$userDetails = json_decode(json_encode($userDetails));
        echo "<pre>"; print_r($userDetails);*/
        return view('admin.orders.order_invoice')->with(compact('orderDetails','userDetails'));
    }

    public function deleteProductVideo($id){
        if (Session::get('adminDetails')['products_access']==0){
            return redirect('/supplier/dashboard')->with('flash_message_error','You have no access for this module');
        }
        // Get Video Name
        $productVideo = Product::select('video')->where('id',$id)->first();

        // Get Video Path
        $video_path = 'videos/';

        // Delete Video if exists in videos folder
        if(file_exists($video_path.$productVideo->video)){
            unlink($video_path.$productVideo->video);
        }

        // Delete Video from Products table
        Product::where('id',$id)->update(['video'=>'']);

        return redirect()->back()->with('flash_message_success','Product Video has been deleted successfully');
    }
}
