<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Banner;
use App\Supplier;

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

        $productsAll = Product::whereHas('supplier', function ($query) {
            $query->where('active', '=', '1');
        })->where('status',1)->paginate(6);

         $products = Product::with('supplier')->where('status',1)->get();
        // $products = Supplier::all()->products;
        // echo "<pre>"; print_r($productsAll); die;
        // echo $products;die;
        //echo "<pre>"; print_r($productDetails); die;
        // echo dump($suppliers);die;
        // foreach ($suppliers as  $value) {
        //     // $productsAll = Product::where('supplier_id',$value->id);
        //     //
        // echo $value->id;
        //     echo "   ";
        // }
        // die;
        // $productsAll = Product::where('supplier_id',$suppliers->id)->paginate(12);
        // echo $productsAll;die;

        // $n = Supplier::find(14)->products;
        // // echo $n;die;
        // foreach ($suppliers as  $value) {
        //     echo $value;die;
        // }


    	// Get All Categories and Sub Categories

        $categories = Category::with('categories')->where(['parent_id' => 0])->get();
        //$categories = json_decode(json_encode($categories));
    	/*echo "<pre>"; print_r($categories); die;*/
         $categories_menu = "";
        // foreach($categories as $cat){
		// 	$categories_menu .= "
		// 	<div class='panel-heading'>
		// 		<h4 class='panel-title'>
		// 			<a data-toggle='collapse' data-parent='#accordian' href='#".$cat->id."'>
		// 				<span class='badge pull-right'><i class='fa fa-plus'></i></span>
		// 				".$cat->name."
		// 			</a>
		// 		</h4>
		// 	</div>
		// 	<div id='".$cat->id."' class='panel-collapse collapse'>
		// 		<div class='panel-body'>
		// 			<ul>";
		// 			$sub_categories = Category::where(['parent_id' => $cat->id])->get();
		// 			foreach($sub_categories as $sub_cat){
		// 				$categories_menu .= "<li><a href='#'>".$sub_cat->name." </a></li>";
		// 			}
		// 				$categories_menu .= "</ul>
		// 		</div>
		// 	</div>
		// 	";
		// }

		$banners = Banner::where('status','1')->get();
		// Meta tags
		$meta_title = "HUBZUH";
		$meta_description = "Online HUB to gether all the Products";
		$meta_keywords = "e-shop website, online shopping, men clothing ,women clothing ";
        return view('index')->with(compact('productsAll','categories_menu',
        'categories','banners','meta_title','meta_description','meta_keywords'));
    }
}
