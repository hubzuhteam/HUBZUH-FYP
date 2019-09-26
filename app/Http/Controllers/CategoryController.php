<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Session;
use App\Supplier;

class CategoryController extends Controller
{
    /////////CATEGORY FOR SUPPLIER/////////////////////////////////////////////////////////////////////////

    public function addCategorySupplier(Request $request){
    	if($request->isMethod('post')){
    		$data = $request->all();
            //echo "<pre>"; print_r($data); die;

            if(empty($data['status'])){
                $status='0';
            }else{
                $status='1';
            }
            if(empty($data['meta_title'])){
                $data['meta_title'] = "";
            }
            if(empty($data['meta_description'])){
                $data['meta_description'] = "";
            }
            if(empty($data['meta_keywords'])){
                $data['meta_keywords'] = "";
            }
    		$category = new Category;
    		$category->name = $data['category_name'];
            $category->parent_id = $data['parent_id'];
            $category->meta_title = $data['meta_title'];
            $category->meta_description = $data['meta_description'];
            $category->meta_keywords = $data['meta_keywords'];
    		$category->description = $data['description'];
            $category->url = $data['url'];
            $category->status = $status;
            $supplierDetails = Supplier::where(['email'=>Session::get('supplierSession')])->first();
            $category->supplier_id=$supplierDetails->id;
            $category->save();
    		return redirect('/supplier/add-category')->with('flash_message_success','Category added Successfully!');
    	}

        $levels = Category::where(['parent_id'=>0])->get();

        $supplierDetails = Supplier::where(['email'=>Session::get('supplierSession')])->first();
        // echo $supplierDetails->id; die;
    	return view('supplier.categories.add_category')->with(compact('levels','supplierDetails'));
    }


    public function viewCategoriesSupplier(){


        $categories = Category::get();

    	//$categories = json_decode(json_encode($categories));
        /*echo "<pre>"; print_r($categories); die;*/

        $supplierDetails = Supplier::where(['email'=>Session::get('supplierSession')])->first();

    	return view('supplier.categories.view_categories')->with(compact('categories','supplierDetails'));
    }

    public function editCategorySupplier(Request $request, $id = null){
        if($request->isMethod('post')){
             $data = $request->all();
        //     //echo "<pre>"; print_r($data); die;
        if(empty($data['status'])){
            $status='0';
        }else{
            $status='1';
        }
        if(empty($data['meta_title'])){
            $data['meta_title'] = "";
        }
        if(empty($data['meta_description'])){
            $data['meta_description'] = "";
        }
        if(empty($data['meta_keywords'])){
            $data['meta_keywords'] = "";
        }
        Category::where(['id'=>$id])->update(['status'=>$status,'name'=>$data['category_name'],
        'parent_id'=>$data['parent_id'],'description'=>$data['description'],
        'url'=>$data['url'],'meta_title'=>$data['meta_title'],
        'meta_description'=>$data['meta_description'],
        'meta_keywords'=>$data['meta_keywords']]);
             return redirect('/supplier/view-categories')->with('flash_message_success',
             'Category updated Successfully!');
         }
         $categoryDetails = Category::where(['id'=>$id])->first();
         $levels = Category::where(['parent_id'=>0])->get();
//        return view('admin.categories.edit_category')->with(compact('categoryDetails','levels'));

        $supplierDetails = Supplier::where(['email'=>Session::get('supplierSession')])->first();

        return view('supplier.categories.edit_category')->with(compact('categoryDetails','levels','supplierDetails'));
    }

    public function deleteCategorySupplier(Request $request, $id = null){


        if(!empty($id)){
            Category::where(['id'=>$id])->delete();
            return redirect()->back()->with('flash_message_success','Category deleted Successfully!');
        }
    }






    // CATEGORY FOR ADMIN//////////////////////////////////////////////////////////////////////////////////
    public function addCategory(Request $request){
        if (Session::get('adminDetails')['categories_access']==0){
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
            if(empty($data['meta_title'])){
                $data['meta_title'] = "";
            }
            if(empty($data['meta_description'])){
                $data['meta_description'] = "";
            }
            if(empty($data['meta_keywords'])){
                $data['meta_keywords'] = "";
            }
    		$category = new Category;
    		$category->name = $data['category_name'];
            $category->parent_id = $data['parent_id'];
            $category->meta_title = $data['meta_title'];
            $category->meta_description = $data['meta_description'];
            $category->meta_keywords = $data['meta_keywords'];
    		$category->description = $data['description'];
            $category->url = $data['url'];
            $category->status = $status;
    		$category->save();
    		return redirect('/admin/view-categories')->with('flash_message_success','Category added Successfully!');
    	}

        $levels = Category::where(['parent_id'=>0])->get();

    	return view('admin.categories.add_category')->with(compact('levels'));
    }


    public function editCategory(Request $request, $id = null){
        if (Session::get('adminDetails')['categories_access']==0){
            return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
        }

         if($request->isMethod('post')){
             $data = $request->all();
        //     //echo "<pre>"; print_r($data); die;
        if(empty($data['status'])){
            $status='0';
        }else{
            $status='1';
        }
        if(empty($data['meta_title'])){
            $data['meta_title'] = "";
        }
        if(empty($data['meta_description'])){
            $data['meta_description'] = "";
        }
        if(empty($data['meta_keywords'])){
            $data['meta_keywords'] = "";
        }
        Category::where(['id'=>$id])->update(['status'=>$status,'name'=>$data['category_name'],
        'parent_id'=>$data['parent_id'],'description'=>$data['description'],
        'url'=>$data['url'],'meta_title'=>$data['meta_title'],
        'meta_description'=>$data['meta_description'],
        'meta_keywords'=>$data['meta_keywords']]);
             return redirect('/supplier/view-categories')->with('flash_message_success',
             'Category updated Successfully!');
         }
         $categoryDetails = Category::where(['id'=>$id])->first();
         $levels = Category::where(['parent_id'=>0])->get();
//        return view('admin.categories.edit_category')->with(compact('categoryDetails','levels'));

        return view('supplier.categories.edit_category')->with(compact('categoryDetails','levels'));
    }

    public function deleteCategory(Request $request, $id = null){
        if (Session::get('adminDetails')['categories_access']==0){
            return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
        }

        if(!empty($id)){
            Category::where(['id'=>$id])->delete();
            return redirect()->back()->with('flash_message_success','Category deleted Successfully!');
        }
    }

    public function viewCategories(){

        if (Session::get('adminDetails')['categories_access']==0){
            return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
        }

        $categories = Category::get();

    	//$categories = json_decode(json_encode($categories));
    	/*echo "<pre>"; print_r($categories); die;*/
    	return view('admin.categories.view_categories')->with(compact('categories'));
    }
}
