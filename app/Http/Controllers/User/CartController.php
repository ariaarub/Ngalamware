<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index(){
        $carts = DB::table('carts')
                ->where('order_detail_id', '=', 0)
                ->join('products', 'carts.product_id', '=', 'products.id')
                ->select('carts.*', 'products.name', 'products.description', 'products.price', 'products.filepath')

                ->get();

        $sum = DB::table('carts')
                ->where('order_detail_id', '=', 0)
                ->join('products', 'carts.product_id', '=', 'products.id')
                ->sum('products.price');


        return view('user.cart', ['carts' => $carts, 'sum' => $sum]);

    }

    public function removeFromCart($id){
        $carts = Cart::find($id);
        $carts->delete();
        return redirect('cart');
    }


    public function checkoutAmount(){
        $carts = DB::table('carts')
            ->where('order_detail_id', '=', 0)
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->select(DB::raw('sum(products.price) as price, products.name'))
            ->groupBy('products.name')
            ->get();

        $sum = DB::table('carts')
            ->where('order_detail_id', '=', 0)
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->sum('products.price');

        return view('user.checkout', ['carts' => $carts, 'sum' => $sum]);

    }
}
