<?php

namespace App\Http\Middleware;

use App\Supplier;
use Closure;
use Session;
class Supplierlogin
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
        if(empty(Session::has('supplierSession'))){
            return redirect('/supplier');
        }else{
            $supplierDetails = Supplier::where('email',Session::get('supplierSession'))->first();
            //echo $supplierDetails;die;
            Session::put('supplierdetails',$supplierDetails);
        }
        return $next($request);
    }
}
