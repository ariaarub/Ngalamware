<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class AddController extends Controller
{
    public function addProducts(Request $request){
        $products = new Product;
        $products->name = $request->name;
        $products->description = $request->description;
        $products->price = $request->price;
        $products->picture = base64_encode($request->picture);
        $products->save();
        return redirect('admin');
    }
}
