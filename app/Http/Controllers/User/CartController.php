<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\OrderDetail;
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

    public function Finish(Request $request){
        $order_details = new OrderDetail;
        $order_details->name = $request->name;
        $order_details->email = $request->email;
        $order_details->address = $request->address;
        $order_details->notes = $request->bill;

        $sum = DB::table('carts')
            ->where('order_detail_id', '=', 0)
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->sum('products.price');
        
        $order_details->total = $sum;
        $order_details->save();

        $id = DB::table('order_details')->max('id');

        $affected = DB::table('carts')
                    ->where('order_detail_id', '=', 0)
                    ->update(['order_detail_id' => $id]);

        return redirect('');
    }
}
