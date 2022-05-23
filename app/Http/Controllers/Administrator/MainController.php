<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function showProducts(){
        $products = DB::table('products')->get();

        return view('administrator.main', ['products' => $products]);
    }
}
