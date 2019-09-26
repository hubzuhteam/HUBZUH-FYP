<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Factory;
use Image;
use App\User;
use App\Admin;
use Auth;
use Illuminate\Support\Facades\Input;
use Session;
use App\Country;
use Illuminate\Support\Facades\Hash;
use DB;
use Mail;
class FactoryController extends Controller
{
    
    public function updateProfile(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            $factoryCount = Factory::where(['email' => Session::get('factorySession')])->count();
            //echo $supplierCount;die;
            if ($factoryCount == 1) {

                //for image upploading
                if($request->hasFile('factory_image')){
                    $image_tmp = Input::file('factory_image');
                    if($image_tmp->isValid()){
                        $extension = $image_tmp->getClientOriginalExtension();
                        $filename = rand(111,99999).'.'.$extension;
                        $large_image_path = 'images/factoryend_images/factory_images/large/'.$filename;
                        $medium_image_path = 'images/factoryend_images/factory_images/medium/'.$filename;
                        $small_image_path = 'images/factoryend_images/factory_images/small/'.$filename;
                        // Resize Images
                        Image::make($image_tmp)->save($large_image_path);
                        Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                        Image::make($image_tmp)->resize(300,300)->save($small_image_path);

                        // Store image name in products table
                        // $product->image = $filename;
                    }
                }else if(!empty($data['factory_image'])){
                    $filename = $data['factory_image'];
                }else{
                    $filename = '';
                }

                Factory::where('email',Session::get('factorySession'))->update(['last_name'=>$data['last_name']
                ,'name'=>$data['name'],
                'factory_name'=>$data['factory_name'],
                'cnic'=>$data['cnic'],
                'address'=>$data['address'],
                'mobile'=>$data['mobile'],
                'factory_mobile'=>$data['factory_mobile'],
                'factory_email'=>$data['factory_email'],
                'deals_in'=>$data['deals_in'],
                'dob'=>$data['dob_date'],
                'factory_image'=>$filename,
                'factory_address'=>$data['factory_address']
            ]);

                return redirect('/factory/edit-profile')->with('flash_message_success', 'Profile updated successfully.');
            }else{
                return redirect('/factory/edit-profile')->with('flash_message_error', 'An error occured..Try again');
            }
        }
    }

    public function edit_profile(Request $request){
        $factoryDetails = Factory::where(['email'=>Session::get('factorySession')])->first();
        // echo $factoryDetails;die;
        return view('factory.edit_profile')->with(compact('factoryDetails'));
    }

    public function login(Request $request){
        if($request->isMethod('POST')){
            $data=$request->all();
            //echo "<pre";print_r($data);die;
            $factoryCount = Factory::where(['email' => $data['email'],
            'password'=>md5($data['password'])])->count();
            //echo $factoryCount;die;
            if ($factoryCount>0) {
                $factoryStatus = Factory::where('email',$data['email'])->first();
                if($factoryStatus->status == 0){
                    return redirect()->back()->with('flash_message_error','Your Factory account is not activated! Please confirm your email to activate.');
                }
                Session::put('factorySession',$data['email']);

                // if(!empty(Session::get('session_id'))){
                //     $session_id = Session::get('session_id');
                //     DB::table('cart')->where('session_id',$session_id)->update(['user_email' => $data['email']]);
                // }

                return redirect('/factory/dashboard');
            } else {
                return redirect()->back()->with('flash_message_error','Invalid Username or Password');
            }
        }
    }

    public function dashboard(){

        ///$supplierDetails = Supplier::where(['email'=>Session::get('supplierSession')])->first();
        //echo $supplierDetails;die;
    return view('factory.dashboard');
    }
    public function FactoryRegisterPage(){
        // echo "test";die;
        return view('factory.factory_register');
    }
    public function FactoryLoginPage(){
        // echo "test";die;
        return view('factory.factory_login');
    }
    public function register(Request $request){
        if($request->isMethod('POST')){
            $data=$request->all();
            //echo "<pre";print_r($data);die;
            //checking if user already exist
            $factoryCount=Factory::where('email',$data['email'])->count();
            $factoryCount=Factory::where('factory_name',$data['factory_name'])->count();
            if($factoryCount>0)
            {   return redirect()->back()->with('flash_message_error','Email Already Exists!');
            }
            if($factoryCount>0)
            {   return redirect()->back()->with('flash_message_error','factory Name Already Exists!');
            }else{
                $Factory = new Factory();
                $Factory->name=$data['name'];
                $Factory->factory_name=$data['factory_name'];
                $Factory->email=$data['email'];
                $Factory->password=md5($data['password']);
                date_default_timezone_set('Asia/Karachi');
                $Factory->created_at = date("Y-m-d H:i:s");
                $Factory->updated_at = date("Y-m-d H:i:s");
                $Factory->save();

                // Send Confirmation Email
                $email = $data['email'];
                $messageData = ['email'=>$data['email'],'name'=>$data['name'],'factory_name'=>$data['factory_name'],'code'=>base64_encode($data['email'])];
                Mail::send('emails.confirmation_factory',$messageData,function($message) use($email){
                    $message->to($email)->subject('Confirm your HUBZUH factory Account');
                });

                return redirect()->back()->with('flash_message_success','Your factory Account has been registered now confirm your Account!');

                // if (Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])) {
                //     Session::put('frontSession',$data['email']);
                //     return redirect('/cart');
                // }
            }
        }
    }

    public function confirmAccount($email){
        $email = base64_decode($email);
        $factoryCount = Factory::where('email',$email)->count();
        if($factoryCount > 0){
            $factoryDetails = Factory::where('email',$email)->first();
            if($factoryDetails->status == 1){
                return redirect('factory/login')->with('flash_message_success','Your Factory account is already activated. You can login now.');
            }else{
                Factory::where('email',$email)->update(['status'=>1]);

                // Send Welcome Email
                $messageData = ['email'=>$email,'name'=>$factoryDetails->name];
                Mail::send('emails.welcome',$messageData,function($message) use($email){
                    $message->to($email)->subject('Welcome to HUBZUH Factory Site');
                });

                return redirect('factory/login')->with('flash_message_success','Your Factory account is activated. You can login now.');
            }
        }else{
            abort(404);
        }
    }
}
