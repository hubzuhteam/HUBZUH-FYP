<?php

namespace App\Http\Middleware;

use App\Supplier;
use Closure;
use Session;
use App\Factory;

class Factorylogin
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
        if(empty(Session::has('factorySession'))){
            return redirect('/factory/login');
        }else{
            $factoryDetails = Factory::where('email',Session::get('factorySession'))->first();
            // echo $factoryDetails;die;
            Session::put('factoryDetails',$factoryDetails);
        }
        return $next($request);
    }
}
