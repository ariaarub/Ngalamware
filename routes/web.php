<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('user.about');
})->name('main');

Route::get('about', function () {return view('user.about');})->name('about');
Route::get('contact', function () {return view('user.contact');})->name('contact');
Route::get('shop', function () {return view('user.shop');})->name('shop');
Route::get('cart', function () {return view('user.cart');})->name('cart');


Route::get('product/add-product', function() {return view('administrator.add');});
Route::get('admin', 'App\Http\Controllers\Administrator\MainController@showProducts');



require __DIR__.'/user.php';require __DIR__.'/administrator.php';