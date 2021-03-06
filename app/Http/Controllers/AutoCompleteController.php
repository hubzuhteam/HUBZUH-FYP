<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
class AutoCompleteController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function search(Request $request)
    {
          $search = $request->get('term');

          $result = Product::where('product_name', 'LIKE', '%'. $search. '%')->get();

          return response()->json($result);

    }
}
