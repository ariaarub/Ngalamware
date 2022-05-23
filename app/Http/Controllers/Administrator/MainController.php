<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;


class MainController extends Controller
{
    public function showProducts(){
        $products = DB::table('products')->get();

        return view('administrator.main', ['products' => $products]);
    }

    public function deleteProduct($id){
        $products = Product::find($id);
        $filepath = $products->filepath;
        $products->delete();
        unlink(public_path('img/for db/'.$filepath));
        return redirect('admin');
    }

    public function editProduct($id){
        $products = Product::find($id);
        return view('administrator.edit', ['products' => $products]);
    }

    public function updateProduct(Request $request){
        $products = Product::find($request->id);
        $products->name = $request->name;
        $products->description = $request->description;
        $products->price = $request->price;
        $products->save();

        return redirect('admin');
    }
}
