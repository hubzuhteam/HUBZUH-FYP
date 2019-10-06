<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Category;
use App\Design;
use App\Product;
use App\Supplier;
use App\Theme;
use Session;
use Illuminate\Http\Request;

class StoreController extends Controller
{

    public function editStoreSupplierTheme(Request $request, $id = null){


            // echo "$filename";die;
            $supplierDetails = Supplier::where(['email'=>Session::get('supplierSession')])->first();

            Supplier::where(['id'=>$supplierDetails->id])->update(['theme_id'=>$id
             ]);
             return redirect('/supplier/edit-store/'.$supplierDetails->id)->with('flash_message_success',
                 'Theme has been Updated updated Successfully!');

        $designs = Design::get();

        $supplierDetails = Supplier::where(['email'=>Session::get('supplierSession')])->first();
        return view('supplier.store.edit_store')->with(compact('supplierDetails','designs'));
    }
    ////static theme for supplier to select
    public function  viewTheme($id=null)
    {
        return view('themes.view_theme_'.$id);
    }
    //
    public function  viewStore($id=null)
    {
        // $supplierDetails = Supplier::where(['email'=>Session::get('supplierSession')])->first();
        $supplier=Supplier::where('id',$id)->first();

        $productsAll = Product::whereHas('supplier', function ($query) {
            $query->where('active', '=', '1');
        })->where(['status'=>'1','supplier_id'=>$supplier->id])->paginate(12);

        $products = Product::with('supplier')->where('status',1)->get();

        $categories = Category::with('categories')->where(['parent_id' => 0])->get();
        $categories_menu = "";

        $banners = Banner::where(['status'=>'1','supplier_id'=>$supplier->id])->get();
        $store=true;

        // $background_color=$supplier->background_color;
        $main_color=$supplier->main_color;
        $secondary_color=$supplier->secondary_color;
        $store_name_color=$supplier->store_name_color;
        $background_img=$supplier->background_img;

        $background_color="white";
        // $product_price_color="black";
        // $secondary_color="black";
        // $store_name_color="black";

        $theme_id=$supplier->theme_id;
        return view('products.view_store_'.$theme_id)->with(compact('productsAll','categories_menu',
            'categories','banners','supplier','store','background_img','background_color','main_color','secondary_color','store_name_color'));
    }
    // STORE EDIT
    public function editStoreSupplier(Request $request, $id = null){
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            //$filename = $data['image'];
            // echo "$filename";die;
            $supplierDetails = Supplier::where(['email'=>Session::get('supplierSession')])->first();

            // Supplier::where(['id'=>$supplierDetails->id])->update(['background_img'=>$filename
            //  ]);
            //  return redirect('/supplier/edit-store/'.$id)->with('flash_message_success',
            //      'Background Image updated Successfully!');
             Supplier::where(['id'=>$id])->update(['main_color'=>$data['main_color']
             ,'secondary_color'=>$data['secondary_color'],'store_name_color'=>$data['store_name_color']]);
             return redirect('/supplier/edit-store/'.$id)->with('flash_message_success',
                 'Store updated Successfully!');
        }
        $designs = Design::get();

        $themes = Theme::orderBy('id','Desc')->get();
        $supplierDetails = Supplier::where(['email'=>Session::get('supplierSession')])->first();
        return view('supplier.store.edit_store')->with(compact('supplierDetails','designs','themes'));
    }
    public function editStoreSupplierBackground(Request $request, $id = null){
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            $filename = $data['image'];
            // echo "$filename";die;
            $supplierDetails = Supplier::where(['email'=>Session::get('supplierSession')])->first();

            Supplier::where(['id'=>$supplierDetails->id])->update(['background_img'=>$filename
             ]);
             return redirect('/supplier/edit-store/'.$id)->with('flash_message_success',
                 'Background Image updated Successfully!');
        }


        $designs = Design::get();

        $supplierDetails = Supplier::where(['email'=>Session::get('supplierSession')])->first();
        return view('supplier.store.edit_store')->with(compact('supplierDetails','designs'));
    }
    public function  viewStoreNotice($id=null)
    {
        $supplierDetails = Supplier::where(['email'=>Session::get('supplierSession')])->first();
        return view('supplier.store.store_notice')->with(compact('supplierDetails'));
    }

}
