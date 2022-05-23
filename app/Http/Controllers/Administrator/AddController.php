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

        $hash = $request->picture->hashName();

        $request->picture->move(public_path().'\img\for db', $hash);

        $products->filepath = $hash;
        $products->save();
        return redirect('admin');
    }
}
