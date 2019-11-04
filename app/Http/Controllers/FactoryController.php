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
use App\Branch;

class FactoryController extends Controller
{
    public function editFactoryStoreBackground(Request $request, $id = null){
        if($request->isMethod('post')){
            $data = $request->all();
            //  echo "<pre>"; print_r($data); die;

            $filename = $data['image'];
            //  echo "$filename";die;
            $factoryDetails = Factory::where(['email'=>Session::get('factorySession')])->first();

            Factory::where(['id'=>$factoryDetails->id])->update(['background_img'=>$filename
             ]);
             return redirect('/factory/edit-factorystore/'.$id)->with('flash_message_success',
                 'Background Image updated Successfully!');
        }


        $designs = Design::get();

        $factoryDetails = Factory::where(['email'=>Session::get('factorySession')])->first();
        return view('factory.store.edit_store')->with(compact('factoryDetails','designs'));
    }

    public function branches(Request $request){
        $factoryDetails = Factory::where(['email'=>Session::get('factorySession')])->first();
        $branches = Branch::where(['factory_id'=>$factoryDetails->id])->get();
        //  echo "<pre>"; print_r($branches); die;

        return view('factory.branches.branches')->with(compact('factoryDetails','branches'));
    }

    public function addBranch(Request $request){

        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            $factoryDetails = Factory::where(['email' => Session::get('factorySession')])->first();
            //echo $supplierCount;die;

            $branch = new Branch;
            $branch->branch_name = $data['branch_name'];
            $branch->branch_location = $data['branch_location'];
            $branch->branch_phn_no = $data['branch_phn_no'];
            $branch->factory_id = $factoryDetails->id;

            $branch->save();
            return redirect('/factory/branches')->with('flash_message_success', 'Branch added successfully.');

        }
    }

    public function deleteBranch(Request $request, $id = null){
        if(!empty($id)){
            Branch::where(['id'=>$id])->delete();
            return redirect()->back()->with('flash_message_success','Branch deleted Successfully!');
        }
    }

    public function editBranch(Request $request, $id = null){
        $factoryDetails = Factory::where(['email' => Session::get('factorySession')])->first();

        $branches = Branch::where(['factory_id'=>$factoryDetails->id])->get();
        $branch = Branch::where(['id'=>$id])->first();

        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            //echo $supplierCount;die;

                Branch::where('id',$id)->update(['branch_name'=>$data['branch_name'],
                'branch_location'=>$data['branch_location'],
                'branch_phn_no'=>$data['branch_phn_no']
            ]);

            $flash_message_success='Branch Updated Successfully';

            return redirect('/factory/branches')->with('flash_message_success','Branch Updated Successfully');
        }
            // echo "<pre>"; print_r($branch); die;
		return view('factory.branches.edit_branch')->with(compact('factoryDetails','branches','branch'));
    }

    public function forgetpassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // /echo "<pre>"; print_r($data); die;/
            $userCount = Factory::where('email',$data['email'])->count();
            if($userCount == 0){
                return redirect()->back()->with('flash_message_error','Email does not exists!');
            }

            //Get factory Details
            $userDetails = Factory::where('email',$data['email'])->first();

            //Generate Random Password
            $random_password = str_random(8);

            //Encode/Secure Password
            $new_password = bcrypt($random_password);

            //Update Password
            Factory::where('email',$data['email'])->update(['password'=>$new_password]);

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

            return redirect('/factory/forgetpassword')->with('flash_message_success','Please check your email for new password!');

        }




        return view('factory.factory_forgot_password');

    }
    public function editfactory(Request $request, $id = null){
        if($request->isMethod('post')){
            $data = $request->all();
       //     //echo "<pre>"; print_r($data); die;
       if(empty($data['active'])){
           $active='0';
       }else{
           $active='1';
       }

       Factory::where(['id'=>$id])->update(['active'=>$active]);
            return redirect('/admin/view-factories')->with('flash_message_success',
            'Factory updated Successfully!');
        }

       $factoryDetails = Factory::where(['email'=>Session::get('factorySession')])->first();

       return view('admin.factories.view_factory')->with(compact('factoryDetails'));
    }

    public function viewFactory(){

        $factories = Factory::get();
        return view('admin.factories.view_factory')->with(compact('factories'));
    }


    public function logout(){
        Auth::logout();
        Session::forget('factorySession');
        return redirect('/factory/login');
    }

    public function updateProfile(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data);die;
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

                        // Factory image name in products table
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

        $factoryDetails = Factory::where(['email'=>Session::get('factorySession')])->first();
        // echo $factoryDetails;die;
        return view('factory.dashboard')->with(compact('factoryDetails'));
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
            // echo $factoryCount;die;
            $factoryCount2=Factory::where('factory_name',$data['factory_name'])->count();
            if($factoryCount>0)
            {
                return redirect()->back()->with('flash_message_error','Email Already Exists!');
            }
            if($factoryCount2>0)
            {
                return redirect()->back()->with('flash_message_error','factory Name Already Exists!');
            }
            else{
                $Factory = new Factory();
                $Factory->name=$data['name'];
                $Factory->factory_name=$data['factory_name'];
                $Factory->email=$data['email'];
                $Factory->password=md5($data['password']);
                date_default_timezone_set('Asia/Karachi');
                $Factory->created_at = date("Y-m-d H:i:s");
                $Factory->updated_at = date("Y-m-d H:i:s");
                $Factory->factory_image='store.gif';
                $Factory->theme_id='1';
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
