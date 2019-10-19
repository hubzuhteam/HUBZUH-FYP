<?php

namespace App\Http\Controllers;


use App\Banner;
use App\Category;
use App\Design;
use App\Product;
use App\Factory;
use App\Theme;
use Session;
use Illuminate\Http\Request;
use App\Supplier;
use App\Branch;

class FactoryStoreController extends Controller
{
    public function  viewFactoryStore($id=null)
    {
        // echo "$id";
        // $supplierDetails = Factory::where(['email'=>Session::get('supplierSession')])->first();
        $factory=Factory::where('id',$id)->first();

        $productsAll = Product::whereHas('factory', function ($query) {
            $query->where('active', '=', '1');
        })->where(['status'=>'1','factory_id'=>$factory->id])->paginate(12);

        $products = Product::with('factory')->where('status',1)->get();

        $categories = Category::with('categories')->where(['parent_id' => 0])->get();
        $categories_menu = "";

        $banners = Banner::where(['status'=>'1','factory_id'=>$factory->id])->get();
        $store=true;

        // $background_color=$factory->background_color;
        $main_color=$factory->main_color;
        $secondary_color=$factory->secondary_color;
        $factorystore_name_color=$factory->factorystore_name_color;
        $background_img=$factory->background_img;

        $background_color="white";
        // $product_price_color="black";
        // $secondary_color="black";
        // $store_name_color="black";

        $branches = Branch::where(['factory_id'=>$factory->id])->get();
        //  echo "<pre>"; print_r($branches); die;


        $theme_id=$factory->theme_id;
        return view('products.view_factorystore_'.$theme_id)->with(compact('productsAll','categories_menu','branches',
            'categories','banners','factory','store','background_img','background_color','main_color','secondary_color','factorystore_name_color'));
    }

    public function  viewfactoryNotice($id=null)
    {
        $factoryDetails = Factory::where(['email'=>Session::get('factorySession')])->first();
        return view('factory.factorystore.factory_store_notice')->with(compact('factoryDetails'));
    }

    public function  viewStore($id=null)
    {

        $factory=Factory::where('id',$id)->first();

        $productsAll = Product::whereHas('factory', function ($query) {
            $query->where('active', '=', '1');
        })->where(['status'=>'1','factory_id'=>$factory->id])->paginate(12);

        $products = Product::with('factory')->where('status',1)->get();

        $categories = Category::with('categories')->where(['parent_id' => 0])->get();
        $categories_menu = "";

        $banners = Banner::where(['status'=>'1','factory_id'=>$factory->id])->get();
        $store=true;

        // $background_color=$supplier->background_color;
        $main_color=$factory->main_color;
        $secondary_color=$factory->secondary_color;
        $factorystore_name_color=$factory->factorystore_name_color;
        $background_img=$factory->background_img;

        $background_color="white";

        $theme_id=$factory->theme_id;
        return view('products.view_factorystore_'.$theme_id)->with(compact('productsAll','categories_menu',
            'categories','banners','factory','store','background_img','background_color','main_color','secondary_color','factorystore_name_color'));
    }

    /////////////

    public function editfactorystore(Request $request, $id = null){
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            //$filename = $data['image'];
            // echo "$filename";die;
            $factoryDetails = Factory::where(['email'=>Session::get('factorySession')])->first();

            // Supplier::where(['id'=>$supplierDetails->id])->update(['background_img'=>$filename
            //  ]);
            //  return redirect('/supplier/edit-store/'.$id)->with('flash_message_success',
            //      'Background Image updated Successfully!');
             Factory::where(['id'=>$id])->update(['main_color'=>$data['main_color']
             ,'secondary_color'=>$data['secondary_color'],'factorystore_name_color'=>$data['factorystore_name_color']]);

             return redirect('/factory/edit-factorystore/'.$id)->with('flash_message_success',
                 'Store updated Successfully!');
        }
        $designs = Design::get();

        $themes = Theme::orderBy('id','Desc')->get();
        $factoryDetails = Factory::where(['email'=>Session::get('factorySession')])->first();
        return view('factory.factorystore.edit_factorystore')->with(compact('factoryDetails','designs','themes'));
    }

    public function  viewTheme($id=null)
    {
        return view('themes.view_theme_'.$id);
    }

    public function editFactorystoreTheme(Request $request, $id = null){

        // echo "$filename";die;
        $factoryDetails = Factory::where(['email'=>Session::get('factorySession')])->first();

        Factory::where(['id'=>$factoryDetails->id])->update(['theme_id'=>$id
         ]);
         return redirect('/factory/edit-factorystore/'.$factoryDetails->id)->with('flash_message_success',
             'Theme has been Updated updated Successfully!');

    $designs = Design::get();

    $factoryDetails = Factory::where(['email'=>Session::get('factorySession')])->first();
    return view('factory.factorystore.edit_factorystore')->with(compact('factoryDetails','designs'));
}
/////////

public function editStorefactoryBackground(Request $request, $id = null){
    if($request->isMethod('post')){
        $data = $request->all();
        // echo "<pre>"; print_r($data); die;

        $filename = $data['image'];
        // echo "$filename";die;
        $factoryDetails = Factory::where(['email'=>Session::get('factorySession')])->first();

        Factory::where(['id'=>$factoryDetails->id])->update(['background_img'=>$filename
         ]);
         return redirect('/factory/edit-factorystore/'.$id)->with('flash_message_success',
             'Background Image updated Successfully!');
    }

    $designs = Design::get();

    $factoryDetails = Factory::where(['email'=>Session::get('factorySession')])->first();
    return view('factory.factorystore.edit_factorystore')->with(compact('factoryDetails','designs'));
}




}
