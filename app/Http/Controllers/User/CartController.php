<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index(){
        $carts = DB::table('carts')
                ->where('order_detail_id', '!=', 0)
                ->join('products', 'carts.product_id', '=', 'products.id')
                ->select('carts.*', 'products.*')
                ->get();


        return view('user.cart', ['carts' => $carts]);

    }
}
