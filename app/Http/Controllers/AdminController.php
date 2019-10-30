<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Session;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Admin;
use App\Feedback;
use App\Chat;

class AdminController extends Controller
{

    public function AdminSendMessage(Request $request){

        $data = $request->all();
        //    echo "<pre>"; print_r($data); die;
        $admin = Admin::where(['username'=>Session::get('adminSession')])->first();

        $chat = new Chat;
           $chat->admin_id = $admin->id;
           $chat->user_id = 6;

           $chat->message = $data['message'];
           $chat->sender = 'admin';
           $chat->save();

           return redirect()->back()->with('flash_message_success','Your Message has been sent');

    }


    public function login(Request $request){
    	if($request->isMethod('post')){
    		$data = $request->input();
            $adminCount = Admin::where(['username' => $data['username'],
            'password'=>md5($data['password']),'status'=>1])->count();
            if($adminCount > 0){
                //echo "Success"; die;
                Session::put('adminSession', $data['username']);
                return redirect('/admin/dashboard');
        	}else{
                //echo "failed"; die;
                return redirect('/admin')->with('flash_message_error','Invalid Username or Password');
        	}
    	}
    	return view('admin.admin_login');
    }

    public function dashboard(){
        // if(Session::has('adminSession')){
        // }else {
        //     return redirect('/admin')->with('flash_message_error','Please Login to success');
        // }
$feedback=Feedback::all();
//    foreach ($feedback as $fee)
//        {
//            echo $fee->id;
//        }
//    die;
    return view('admin.dashboard')->with(compact('feedback'));
}

    public function logout(){
        Session::flush();
        return redirect('/admin')->with('flash_message_success','Logged out Successfully');

    }

    public function chkPassword(Request $request){
        $data = $request->all();
        //echo "<pre>"; print_r($data); die;
        $adminCount = Admin::where(['username' => Session::get('adminSession'),
        'password'=>md5($data['current_pwd'])])->count();
            if ($adminCount == 1) {
                //echo '{"valid":true}';die;
                echo "true"; die;
            } else {
                //echo '{"valid":false}';die;
                echo "false"; die;
            }

    }
    public function updatePassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            $adminCount = Admin::where(['username' => Session::get('adminSession'),
            'password'=>md5($data['current_pwd'])])->count();

            if ($adminCount == 1) {
                // here you know data is valid
                $password = md5($data['new_pwd']);
                Admin::where('username',Session::get('adminSession'))->update(['password'=>$password]);
                return redirect('/admin/settings')->with('flash_message_success', 'Password updated successfully.');
            }else{
                return redirect('/admin/settings')->with('flash_message_error', 'Current Password entered is incorrect.');
            }
        }
    }


    public function settings()
    {
        $adminDetails = Admin::where(['username'=>Session::get('adminSession')])->first();
        return view('admin.settings')->with(compact('adminDetails'));
    }

    public function viewAdmins(){
        $admins = Admin::get();
        return view('admin.admins.view_admins')->with(compact('admins'));
    }

    public function addAdmin(Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();
            // echo "<prev>"; print_r($data); die;

            $adminCount = Admin::where('username',$data['username'])->count();
            if ($adminCount>0) {
                return redirect()->back()->with('flash_message_error','Admin / Sub Admin already exist! Can you please choose another!');
            } else {
                if (empty($data['status'])) {
                    $data['status'] = 0;
                }
                if ($data['type']=="Admin") {
                    $admin = new Admin();
                    $admin->type = $data['type'];
                    $admin->username = $data['username'];
                    $admin->password = md5($data['password']);
                    $admin->status = $data['status'];
                    $admin->save();
                return redirect()->back()->with('flash_message_success','Admin added Successfully');
                }
                else if ($data['type']=="Sub Admin") {

                    if (empty($data['categories_access'])) {
                        $data['categories_access'] = 0;
                    }
                    if (empty($data['products_access'])) {
                        $data['products_access'] = 0;
                    }
                    if (empty($data['orders_access'])) {
                        $data['orders_access'] = 0;
                    }
                    if (empty($data['users_access'])) {
                        $data['users_access'] = 0;
                    }

                    $admin = new Admin();
                    $admin->type = $data['type'];
                    $admin->username = $data['username'];
                    $admin->password = md5($data['password']);
                    $admin->status = $data['status'];
                    $admin->categories_access = $data['categories_access'];
                    $admin->products_access = $data['products_access'];
                    $admin->orders_access = $data['orders_access'];
                    $admin->users_access = $data['users_access'];

                    $admin->save();
                    return redirect()->back()->with('flash_message_success','Sub Admin added Successfully');
                }


            }

        }
        return view('admin.admins.add_admin');
    }

    public function editAdmin(Request $request,$id){
        $adminDetails = Admin::where('id',$id)->first();
        // $orderDetails = json_decode(json_encode($adminDetails));
            //  echo "<prev>"; print_r($adminDetails); die;

        if ($request->isMethod('post')) {
            $data = $request->all();
            //  echo "<prev>"; print_r($data); die;

            if (empty($data['status'])) {
                    $data['status'] = 0;
                }
                if ($data['type']=="Admin") {
                    Admin::where('username',$data['username'])->updated(['password'=>md5($data['password']),'status'=>$data['status']]);
                return redirect()->back()->with('flash_message_success','Admin Updated Successfully');
                }
                else if ($data['type']=="Sub Admin") {

                    if (empty($data['categories_access'])) {
                        $data['categories_access'] = 0;
                    }
                    if (empty($data['products_access'])) {
                        $data['products_access'] = 0;
                    }
                    if (empty($data['orders_access'])) {
                        $data['orders_access'] = 0;
                    }
                    if (empty($data['users_access'])) {
                        $data['users_access'] = 0;
                    }

                    Admin::where('username',$data['username'])->
                    update(['password'=>md5($data['password']),'status'=>$data['status'],
                    'categories_access'=>$data['categories_access'],
                    'products_access'=>$data['products_access'],
                    'orders_access'=>$data['orders_access'],
                    'users_access'=>$data['users_access']]);

                    return redirect()->back()->with('flash_message_success','Sub Admin Updated Successfully');
                }
        }
        return view('admin.admins.edit_admin')->with(compact('adminDetails'));
    }
}
