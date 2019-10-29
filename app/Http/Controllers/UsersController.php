<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Session;
use App\Country;
use Illuminate\Support\Facades\Hash;
use DB;
use Mail;
use App\Supplier;
use App\Chat;
use Illuminate\Support\Facades\Input;
use Image;
class UsersController extends Controller
{
    public function UserSendMessage(Request $request){

        $data = $request->all();
        //    echo "<pre>"; print_r($data); die;
        $user = User::where(['email'=>Session::get('frontSession')])->first();

        $chat = new Chat;
           $chat->admin_id = 1;
           $chat->user_id = $user->id;

           $chat->message = $data['message'];
           $chat->sender = 'User';
           $chat->save();

           return redirect()->back()->with('flash_message_success','Your Message has been sent');

    }
    public function chats(){
        $user = User::where(['email'=>Session::get('frontSession')])->first();

        $chatsWithAdmin = Chat::where(['user_id'=>$user->id])->groupBy('admin_id')->get();
        // echo "<pre>"; print_r($chats); die;

        return view('users.chats')->with(compact('chatsWithAdmin'));
    }

    public function login(Request $request){
        if($request->isMethod('POST')){
            $data=$request->all();
            //echo "s";
            if (Auth::attempt(['email' => $data['email'] , 'password' => $data['password']])) {

                $userStatus = User::where('email',$data['email'])->first();
                if($userStatus->status == 0){
                    return redirect()->back()->with('flash_message_error','Your account is not activated! Please confirm your email to activate.');
                }
                Session::put('frontSession',$data['email']);

                // if(!empty(Session::get('session_id'))){
                //     $session_id = Session::get('session_id');
                //     DB::table('cart')->where('session_id',$session_id)->update(['user_email' => $data['email']]);
                // }

                return redirect('/');
            } else {
                return redirect()->back()->with('flash_message_error','Invalid Username or Password');
            }

        }

    }
    public function userLoginRegister(){
        // echo "test";die;
        $meta_title = "User Login/Register - HUBZUH Website";
        return view('users.login_register')->with(compact('meta_title'));
    }
    public function register(Request $request){
        if($request->isMethod('POST')){
            $data=$request->all();
            //echo "<pre";print_r($data);die;
            //checking if user already exist
            $usersCount=User::where('email',$data['email'])->count();
            if($usersCount>0)
            {   return redirect()->back()->with('flash_message_error','Email Already Exists!');
            }else{
                $user = new User();
                $user->name=$data['name'];
                $user->email=$data['email'];
                $user->password=bcrypt($data['password']);
                date_default_timezone_set('Asia/Karachi');
                $user->created_at = date("Y-m-d H:i:s");
                $user->updated_at = date("Y-m-d H:i:s");
                $user->save();

                // Send Confirmation Email
                $email = $data['email'];
                $messageData = ['email'=>$data['email'],'name'=>$data['name'],'code'=>base64_encode($data['email'])];
                Mail::send('emails.confirmation',$messageData,function($message) use($email){
                    $message->to($email)->subject('Confirm your HUBZUH Account');
                });

                return redirect()->back()->with('flash_message_success','Your Account has been registered now confirm your Account!');

                if (Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])) {
                    Session::put('frontSession',$data['email']);
                    return redirect('/cart');
                }
            }
        }
    }
    public function forgotPassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            /*echo "<pre>"; print_r($data); die;*/
            $userCount = User::where('email',$data['email'])->count();
            if($userCount == 0){
                return redirect()->back()->with('flash_message_error','Email does not exists!');
            }

            //Get User Details
            $userDetails = User::where('email',$data['email'])->first();

            //Generate Random Password
            $random_password = str_random(8);

            //Encode/Secure Password
            $new_password = bcrypt($random_password);

            //Update Password
            User::where('email',$data['email'])->update(['password'=>$new_password]);

            //Send Forgot Password Email Code
            $email = $data['email'];
            $name = $userDetails->name;
            $messageData = [
                'email'=>$email,
                'name'=>$name,
                'password'=>$random_password
            ];
            Mail::send('emails.forgotpassword',$messageData,function($message)use($email){
                $message->to($email)->subject('New Password - HUBZUH Team');
            });

            return redirect('login-register')->with('flash_message_success','Please check your email for new password!');

        }
        return view('users.forgot_password');
    }
    public function checkEmail(Request $request){
        //checking if user already exist
        $data=$request->all();
        $usersCount=User::where('email',$data['email'])->count();
        if($usersCount>0)
        {
            echo "false";
        }else{
            echo "Successs"; die;
        }
    }

    public function logout(){
        Auth::logout();
        Session::forget('frontSession');
        Session::forget('session_id');
        Session::forget('CouponAmount');
        Session::forget('CouponCode');
        return redirect('/');
    }

    public function account(Request $request){
        $user_id=Auth::user()->id;
        $userDetails=User::find($user_id);
        $countries=Country::get();

        if($request->isMethod('POST')){
            $data=$request->all();


            if (empty($data['name'])) {
              return redirect()->back()->with('flash_message_error','Please Enter your Name to update your account.');

            }
            if($request->hasFile('user_image')){
                // echo "hhnj";die;
                $image_tmp = Input::file('user_image');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/frontend_images/users/large/'.$filename;
                    $medium_image_path = 'images/frontend_images/users/medium/'.$filename;
                    $small_image_path = 'images/frontend_images/users/small/'.$filename;
                    // Resize Images
                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(300,300)->save($small_image_path);

                    // Store image name in products table
                    // $product->image = $filename;
                }
            }else if(!empty($data['user_image'])){
                $filename = $data['user_image'];
            }else{
                $filename = '';
            }
            if (empty($data['address'])) {
                $data['address']='';
            }
            if (empty($data['city'])) {
                $data['city']='';
            }
            if (empty($data['state'])) {
                $data['state']='';
            }
            if (empty($data['country'])) {
                $data['country']='';
            }
            if (empty($data['pincode'])) {
                $data['pincode']='';
            }
            if (empty($data['mobile'])) {
                $data['mobile']='';
            }
            $user=User::find($user_id);
            $user->name = $data['name'];
            $user->user_image = $filename;
            $user->address = $data['address'];
            $user->city = $data['city'];
            $user->state = $data['state'];
            $user->country = $data['country'];
            $user->pincode = $data['pincode'];
            $user->mobile = $data['mobile'];
            $user->save();
              return redirect()->back()->with('flash_message_success','Your account details has been updated.');


        }

        return view('users.account')->with(compact('countries','userDetails'));
    }

    public function chkUserPassword(Request $request){
        $data = $request->all();
        /*echo "<pre>"; print_r($data); die;*/
        $current_password = $data['current_pwd'];
        $user_id = Auth::User()->id;
        $check_password = User::where('id',$user_id)->first();
        if(Hash::check($current_password,$check_password->password)){
            echo "true"; die;
        }else{
            echo "false"; die;
        }
    }

    public function updatePassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            /*echo "<pre>"; print_r($data); die;*/
            $old_pwd = User::where('id',Auth::User()->id)->first();
            $current_pwd = $data['current_pwd'];
            if(Hash::check($current_pwd,$old_pwd->password)){
                // Update password
                $new_pwd = bcrypt($data['new_pwd']);
                User::where('id',Auth::User()->id)->update(['password'=>$new_pwd]);
                return redirect()->back()->with('flash_message_success',' Password updated successfully!');
            }else{
                return redirect()->back()->with('flash_message_error','Current Password is incorrect!');
            }
        }
    }

    public function viewUsers(){
        if (Session::get('adminDetails')['users_access']==0){
            return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
        }
        $users = User::get();
        return view('admin.users.view_users')->with(compact('users'));
    }


    public function confirmAccount($email){
        $email = base64_decode($email);
        $userCount = User::where('email',$email)->count();
        if($userCount > 0){
            $userDetails = User::where('email',$email)->first();
            if($userDetails->status == 1){
                return redirect('login-register')->with('flash_message_success','Your Email account is already activated. You can login now.');
            }else{
                User::where('email',$email)->update(['status'=>1]);

                // Send Welcome Email
                $messageData = ['email'=>$email,'name'=>$userDetails->name];
                Mail::send('emails.welcome',$messageData,function($message) use($email){
                    $message->to($email)->subject('Welcome to HUBZUH');
                });

                return redirect('login-register')->with('flash_message_success','Your Email account is activated. You can login now.');
            }
        }else{
            abort(404);
        }
    }
}
