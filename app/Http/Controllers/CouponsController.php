<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;
use App\Supplier;
use Session;
use App\Factory;
class CouponsController extends Controller
{


    /////////////////FACTORY////////////
    public function addCouponFactory(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            $coupon = new Coupon;
            $coupon->coupon_code = $data['coupon_code'];
            $factoryDetails = Factory::where(['email'=>Session::get('factorySession')])->first();
          //  echo $supplierDetails->id;die;
            $coupon->factory_id=$factoryDetails->id;
            $coupon->amount_type = $data['amount_type'];
            $coupon->expiry_date = $data['expiry_date'];
            //$coupon->expiry_date=Carbon::createFromFormat('m/d/Y', $data['expiry_date'])->format('Y-m-d');
//            $coupon->expiry_date  = date('Y-m-d');

            $coupon->amount = $data['amount'];
            //echo $coupon->expiry_date;die;
            if(empty($data['status'])){
                $data['status'] = 0;
            }
            $coupon->status = $data['status'];
            $coupon->save();
            return redirect()->action('CouponsController@addCouponFactory')->with('flash_message_success', 'Coupon has been added successfully');
        }
        $factoryDetails = Factory::where(['email'=>Session::get('factorySession')])->first();

        return view('factory.coupons.add_coupons')->with(compact('factoryDetails'));
    }
    public function viewCouponsFactory(){
        $factoryDetails = Factory::where(['email'=>Session::get('factorySession')])->first();
//        $coupons = Coupon::orderBy('id','DESC')->get();
//        echo $coupons;  die;

        $coupons = Coupon::get();
       // echo $supplierDetails->id;die;
$sup_id=$factoryDetails->id;

        return view('Factory.coupons.view_coupons')->with(compact('coupons','factoryDetails','sup_id'));
    }


    public function editCouponFactory(Request $request, $id = null){
        if($request->isMethod('post')){
            $data = $request->all();
            //     //echo "<pre>"; print_r($data); die;

            Coupon::where(['id'=>$id])->update(['coupon_code'=>$data['coupon_code'],'amount'=>$data['amount'],'amount_type'=>$data['amount_type'],
                'expiry_date'=>$data['expiry_date']]);
            return redirect('/factory/view-coupons')->with('flash_message_success',
                'Coupon updated Successfully!');
        }

        $coupon =Coupon::where(['id'=>$id])->first();
        $factoryDetails = Factory::where(['email'=>Session::get('factorySession')])->first();
        return view('factory.coupons.edit_coupon')->with(compact('coupon','factoryDetails'));
    }

    public function deleteCouponFactory(Request $request, $id = null){
        if(!empty($id)){
            Coupon::where(['id'=>$id])->delete();
            return redirect('/factory/view-coupons')->with('flash_message_success','Coupon deleted Successfully!');
        }
    }
    //////Supplier/////////
    public function addCouponSupplier(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            $coupon = new Coupon;
            $coupon->coupon_code = $data['coupon_code'];
            $supplierDetails = Supplier::where(['email'=>Session::get('supplierSession')])->first();
          //  echo $supplierDetails->id;die;
            $coupon->supplier_id=$supplierDetails->id;
            $coupon->amount_type = $data['amount_type'];
            $coupon->expiry_date = $data['expiry_date'];
            //$coupon->expiry_date=Carbon::createFromFormat('m/d/Y', $data['expiry_date'])->format('Y-m-d');
//            $coupon->expiry_date  = date('Y-m-d');

            $coupon->amount = $data['amount'];
            //echo $coupon->expiry_date;die;
            if(empty($data['status'])){
                $data['status'] = 0;
            }
            $coupon->status = $data['status'];
            $coupon->save();
            return redirect()->action('CouponsController@addCouponSupplier')->with('flash_message_success', 'Coupon has been added successfully');
        }
        $supplierDetails = Supplier::where(['email'=>Session::get('supplierSession')])->first();

        return view('supplier.coupons.add_coupons')->with(compact('supplierDetails'));
    }
    public function viewCouponsSupplier(){
        $supplierDetails = Supplier::where(['email'=>Session::get('supplierSession')])->first();
//        $coupons = Coupon::orderBy('id','DESC')->get();
//        echo $coupons;  die;

        $coupons = Coupon::get();
       // echo $supplierDetails->id;die;
$sup_id=$supplierDetails->id;

        return view('Supplier.coupons.view_coupons')->with(compact('coupons','supplierDetails','sup_id'));
    }


    public function editCouponSupplier(Request $request, $id = null){
        if($request->isMethod('post')){
            $data = $request->all();
            //     //echo "<pre>"; print_r($data); die;

            Coupon::where(['id'=>$id])->update(['coupon_code'=>$data['coupon_code'],'amount'=>$data['amount'],'amount_type'=>$data['amount_type'],
                'expiry_date'=>$data['expiry_date']]);
            return redirect('/supplier/view-coupons')->with('flash_message_success',
                'Coupon updated Successfully!');
        }

        $coupon =Coupon::where(['id'=>$id])->first();
        $supplierDetails = Supplier::where(['email'=>Session::get('supplierSession')])->first();
        return view('supplier.coupons.edit_coupon')->with(compact('coupon','supplierDetails'));
    }

    public function deleteCouponSupplier(Request $request, $id = null){
        if(!empty($id)){
            Coupon::where(['id'=>$id])->delete();
            return redirect('/supplier/view-coupons')->with('flash_message_success','Coupon deleted Successfully!');
        }
    }



    //////ADMIN/////////
    public function addCoupon(Request $request){
		if($request->isMethod('post')){
			$data = $request->all();
		// 	/*echo "<pre>"; print_r($data); die;*/
			$coupon = new Coupon;
			$coupon->coupon_code = $data['coupon_code'];
			$coupon->amount_type = $data['amount_type'];
			$coupon->amount = $data['amount'];
			$coupon->expiry_date = $data['expiry_date'];
            if(empty($data['status'])){
				$data['status'] = 0;
			}
            $coupon->status = $data['status'];
			$coupon->save();
			return redirect()->action('CouponsController@viewCoupons')->with('flash_message_success', 'Coupon has been added successfully');
		}
		return view('admin.coupons.add_coupon');
	}

	public function editCoupon(Request $request,$id=null){
		if($request->isMethod('post')){
			$data = $request->all();
			/*echo "<pre>"; print_r($data); die;*/
			$coupon = Coupon::find($id);
			$coupon->coupon_code = $data['coupon_code'];
			$coupon->amount_type = $data['amount_type'];
			$coupon->amount = $data['amount'];
			$coupon->expiry_date = $data['expiry_date'];
			if(empty($data['status'])){
				$data['status'] = 0;
			}
			$coupon->status = $data['status'];
			$coupon->save();
			return redirect()->action('CouponsController@viewCoupons')->with('flash_message_success', 'Coupon has been updated successfully');
		}
		$couponDetails = Coupon::find($id);
		/*$couponDetails = json_decode(json_encode($couponDetails));
		echo "<pre>"; print_r($couponDetails); die;*/
		return view('admin.coupons.edit_coupon')->with(compact('couponDetails'));
	}

	public function viewCoupons(){
		$coupons = Coupon::orderBy('id','DESC')->get();
		return view('admin.coupons.view_coupons')->with(compact('coupons'));
	}

	public function deleteCoupon($id = null){
        Coupon::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Coupon has been deleted successfully');
    }
}
