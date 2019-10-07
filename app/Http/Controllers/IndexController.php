<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Banner;
use App\Supplier;
use App\Factory;

class IndexController extends Controller
{
    public function index(){
        // //in Ascending order
        // $productsAll = Product::get();

        // //in descending order
        // $productsAll = Product::orderBy('id','DESC')->get();

        //in radnom order
        // $productsAll = Product::inRandomOrder()->where('status',1)->paginate(12);
        //->where('feature_item',1)
        // $suppliers = Supplier::where(['active'=>1])->get();

        $suppliersAll = Supplier::inRandomOrder()->where('status',1)->where('active',1)->paginate(12);

        $productsAll = Product::inRandomOrder()->whereHas('supplier', function ($query) {
            $query->where('active', '=', '1');
        })->orwhereHas('factory', function ($query) {
            $query->where('active', '=', '1');
        })->where('status',1)->paginate(6);

        //  $products = Product::with('supplier')->where('status',1)->get();
    	// Get All Categories and Sub Categories

        $categories = Category::with('categories')->where(['parent_id' => 0])->get();
        //$categories = json_decode(json_encode($categories));
    	/*echo "<pre>"; print_r($categories); die;*/
         $categories_menu = "";


		$banners = Banner::where('status','1')->get();
		// Meta tags
		$meta_title = "HUBZUH";
		$meta_description = "Online HUB to gether all the Products";
		$meta_keywords = "e-shop website, online shopping, men clothing ,women clothing ";
        return view('index')->with(compact('productsAll','categories_menu','suppliersAll',
        'categories','banners','meta_title','meta_description','meta_keywords'));
    }
}
