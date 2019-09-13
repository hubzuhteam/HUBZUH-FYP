<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App\Admin;
use Illuminate\Support\Facades\Route;

class Adminlogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(empty(Session::has('adminSession'))){
            return redirect('/admin');
        }else{
            $adminDetails = Admin::where('username',Session::get('adminSession'))->first();
            Session::put('admindetails',$adminDetails);

            if ($adminDetails['type']=="Admin") {
                $adminDetails['categories_access']=1;
                $adminDetails['products_access']=1;
                $adminDetails['orders_access']=1;
                $adminDetails['users_access']=1;
            }
            Session::put('adminDetails',$adminDetails);

            $currentPath = Route::getFacadeRoot()->current()->uri();
            if ($currentPath=="admin/view-categories" && Session::get('adminDetails')['categories_access']==0) {
                return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
            }
            if ($currentPath=="admin/add-category" && Session::get('adminDetails')['categories_access']==0) {
                return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
            }
            if ($currentPath=="admin/view-products" && Session::get('adminDetails')['products_access']==0) {
                return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
            }
            if ($currentPath=="admin/add-product" && Session::get('adminDetails')['products_access']==0) {
                return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
            }
            if ($currentPath=="admin/view-orders" && Session::get('adminDetails')['orders_access']==0) {
                return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
            }
            if ($currentPath=="admin/view-users" && Session::get('adminDetails')['orders_users']==0) {
                return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
            }

        }
        return $next($request);
    }
}
