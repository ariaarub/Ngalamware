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

/* User section */
Route::get('about', function () {return view('user.about');})->name('about');
Route::get('contact', function () {return view('user.contact');})->name('contact');
Route::get('shop', 'App\Http\Controllers\User\ShopController@index')->name('shop');
Route::get('cart', function () {return view('user.cart');})->name('cart');

Route::get('product/{id}', 'App\Http\Controllers\User\ShopController@lookProduct');

Route::get('checkout', function () {return view('user.checkout');})->name('checkout');

/* Administrator section */

/* Main show product */
Route::get('admin', 'App\Http\Controllers\Administrator\MainController@showProducts');

/* Add product */
Route::get('product/add-product', function() {return view('administrator.add');})->name('product.add');
Route::post('/added', 'App\Http\Controllers\Administrator\AddController@addProducts');

/* Delete product */
Route::get('product/delete/{id}', 'App\Http\Controllers\Administrator\MainController@deleteProduct');

/* Edit product */
Route::get('product/edit/{id}', 'App\Http\Controllers\Administrator\MainController@editProduct');
Route::post('product/update', 'App\Http\Controllers\Administrator\MainController@updateProduct');





require __DIR__.'/user.php';require __DIR__.'/administrator.php';