<?php

namespace App\Http\Controllers;

use App\Theme;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Admin;
use Session;

class ThemeController extends Controller
{
    public function deleteTheme(Request $request, $id = null){
        if(!empty($id)){
            Theme::where(['id'=>$id])->delete();
            return redirect()->back()->with('flash_message_success','Theme deleted Successfully!');
        }
    }

    public function viewThemes(){

        $themes = Theme::orderBy('id','Desc')->get();
        $themes = json_decode(json_encode($themes));

       //     //echo "<pre>"; print_r($products); die;
         return view('admin.themes.view_themes')->with(compact('themes'));
   }

   public function addTheme(Request $request){
       if($request->isMethod('post')){
           $data = $request->all();

           $theme = new Theme;


           $adminDetails = Admin::where(['username'=>Session::get('adminSession')])->first();
          $theme->theme_id=$data['theme_id'];
          $theme->theme_name=$data['theme_name'];
          $theme->admin_id=$adminDetails->id;


           $theme->save();
           return redirect('/admin/add-theme')->with('flash_message_success','Theme has been added successfully!');

       }

   return view('admin.themes.add_theme');
   }
}
