<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use App\Supplier;
use App\User;
use App\Admin;
use Auth;
use Illuminate\Support\Facades\Input;
use Session;
use App\Country;
use Illuminate\Support\Facades\Hash;
use DB;
use Mail;
class SupplierController extends Controller
{

    public function editSupplier(Request $request, $id = null){
        if($request->isMethod('post')){
            $data = $request->all();
       //     //echo "<pre>"; print_r($data); die;
       if(empty($data['active'])){
           $active='0';
       }else{
           $active='1';
       }

       Supplier::where(['id'=>$id])->update(['active'=>$active]);
            return redirect('/admin/view-suppliers')->with('flash_message_success',
            'Supplier updated Successfully!');
        }

       $supplierDetails = Supplier::where(['email'=>Session::get('supplierSession')])->first();

       return view('admin.suppliers.view_suppliers')->with(compact('supplierDetails'));
    }
    public function login(Request $request){

        if($request->isMethod('POST')){
            $data=$request->all();
            //echo "<pre";print_r($data);die;
            $supplierCount = Supplier::where(['email' => $data['email'],
            'password'=>md5($data['password'])])->count();
            //echo $adminCount;die;
            if ($supplierCount>0) {

                $supplierStatus = Supplier::where('email',$data['email'])->first();
                if($supplierStatus->status == 0){
                    return redirect()->back()->with('flash_message_error','Your store account is not activated! Please confirm your email to activate.');
                }
                Session::put('supplierSession',$data['email']);

                // if(!empty(Session::get('session_id'))){
                //     $session_id = Session::get('session_id');
                //     DB::table('cart')->where('session_id',$session_id)->update(['user_email' => $data['email']]);
                // }

                return redirect('/supplier/dashboard');
            } else {
                return redirect()->back()->with('flash_message_error','Invalid Username or Password');
            }

        }
    }

    public function edit_profile(Request $request){
        $supplierDetails = Supplier::where(['email'=>Session::get('supplierSession')])->first();
        return view('supplier.edit_profile')->with(compact('supplierDetails'));
    }

    public function updateProfile(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            $supplierCount = Supplier::where(['email' => Session::get('supplierSession')])->count();
            //echo $supplierCount;die;
            if ($supplierCount == 1) {

                //for image upploading
                if($request->hasFile('store_image')){
                    $image_tmp = Input::file('store_image');
                    if($image_tmp->isValid()){
                        $extension = $image_tmp->getClientOriginalExtension();
                        $filename = rand(111,99999).'.'.$extension;
                        $large_image_path = 'images/supplierend_images/store_images/large/'.$filename;
                        $medium_image_path = 'images/supplierend_images/store_images/medium/'.$filename;
                        $small_image_path = 'images/supplierend_images/store_images/small/'.$filename;
                        // Resize Images
                        Image::make($image_tmp)->save($large_image_path);
                        Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                        Image::make($image_tmp)->resize(300,300)->save($small_image_path);

                        // Store image name in products table
                        // $product->image = $filename;
                    }
                }else if(!empty($data['store_image'])){
                    $filename = $data['store_image'];
                }else{
                    $filename = '';
                }

                Supplier::where('email',Session::get('supplierSession'))->update(['last_name'=>$data['last_name']
                ,'name'=>$data['name'],
                'store_name'=>$data['store_name'],
                'cnic'=>$data['cnic'],
                'address'=>$data['address'],
                'mobile'=>$data['mobile'],
                'store_mobile'=>$data['store_mobile'],
                'store_email'=>$data['store_email'],
                'deals_in'=>$data['deals_in'],
                'dob'=>$data['dob_date'],
                'store_image'=>$filename,
                'store_address'=>$data['store_address']
            ]);

                return redirect('/supplier/edit-profile')->with('flash_message_success', 'Profile updated successfully.');
            }else{
                return redirect('/supplier/edit-profile')->with('flash_message_error', 'An error occured..Try again');
            }
        }
    }

    public function dashboard(){
        // if(Session::has('adminSession')){
        // }else {
        //     return redirect('/admin')->with('flash_message_error','Please Login to success');
        // }
        $supplierDetails = Supplier::where(['email'=>Session::get('supplierSession')])->first();
        //echo $supplierDetails;die;
    return view('supplier.dashboard')->with(compact('supplierDetails'));
    }
    public function SupplierRegisterPage(){
        // echo "test";die;
        return view('supplier.supplier_register');
    }
    public function SupplierLoginPage(){
        // echo "test";die;
        return view('supplier.supplier_login');
    }

    public function logout(){
        Auth::logout();
        Session::forget('supplierSession');
        return redirect('/supplier');
    }

    public function register(Request $request){
        if($request->isMethod('POST')){
            $data=$request->all();
            //echo "<pre";print_r($data);die;
            //checking if user already exist
            $supplierCount=Supplier::where('email',$data['email'])->count();
            $storeCount=Supplier::where('store_name',$data['store_name'])->count();
            if($supplierCount>0)
            {   return redirect()->back()->with('flash_message_error','Email Already Exists!');
            }
            if($storeCount>0)
            {   return redirect()->back()->with('flash_message_error','Store Name Already Exists!');
            }else{
                $Supplier = new Supplier();
                $Supplier->name=$data['name'];
                $Supplier->store_name=$data['store_name'];
                $Supplier->email=$data['email'];
                $Supplier->password=md5($data['password']);
                date_default_timezone_set('Asia/Karachi');
                $Supplier->created_at = date("Y-m-d H:i:s");
                $Supplier->updated_at = date("Y-m-d H:i:s");
                $Supplier->save();

                // Send Confirmation Email
                $email = $data['email'];
                $messageData = ['email'=>$data['email'],'name'=>$data['name'],'store_name'=>$data['store_name'],'code'=>base64_encode($data['email'])];
                Mail::send('emails.confirmation_supplier',$messageData,function($message) use($email){
                    $message->to($email)->subject('Confirm your HUBZUH Store Account');
                });

                return redirect()->back()->with('flash_message_success','Your Store Account has been registered now confirm your Account!');

                // if (Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])) {
                //     Session::put('frontSession',$data['email']);
                //     return redirect('/cart');
                // }
            }
        }
    }
    public function confirmAccount($email){
        $email = base64_decode($email);
        $supplierCount = Supplier::where('email',$email)->count();
        if($supplierCount > 0){
            $supplierDetails = Supplier::where('email',$email)->first();
            if($supplierDetails->status == 1){
                return redirect('supplier')->with('flash_message_success','Your Store account is already activated. You can login now.');
            }else{
                Supplier::where('email',$email)->update(['status'=>1]);

                // Send Welcome Email
                $messageData = ['email'=>$email,'name'=>$supplierDetails->name];
                Mail::send('emails.welcome',$messageData,function($message) use($email){
                    $message->to($email)->subject('Welcome to HUBZUH Store Site');
                });

                return redirect('supplier')->with('flash_message_success','Your Store account is activated. You can login now.');
            }
        }else{
            abort(404);
        }
    }

}
