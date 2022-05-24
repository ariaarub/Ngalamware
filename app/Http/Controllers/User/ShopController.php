<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ShopController extends Controller
{
    public function index(){
        $products = Product::all();

        return view('user.shop', ['products' => $products]);
    }

    public function lookProduct($id){
        $products = Product::find($id);
        return view('user.single-product', ['products' => $products]);
    }
}
