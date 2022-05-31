<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administrator\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Administrator\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Administrator\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Administrator\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Administrator\Auth\NewPasswordController;
use App\Http\Controllers\Administrator\Auth\PasswordResetLinkController;
use App\Http\Controllers\Administrator\Auth\RegisteredUserController;
use App\Http\Controllers\Administrator\Auth\VerifyEmailController;
use App\Http\Controllers\Administrator\DashboardController;

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

/* User section */

Route::get('/', function () {
    return view('user.index');
})->name('main');

/* Main sitemaps */
Route::get('about', function () {return view('user.about');})->name('about');

/* Contact us */
Route::get('contact', function () {return view('user.contact');})->name('contact');
Route::post('/emailed', 'App\Http\Controllers\User\ContactController@appendMessage');

Route::get('shop', 'App\Http\Controllers\User\ShopController@index')->name('shop');


Route::get('cart', 'App\Http\Controllers\User\CartController@index')->name('cart');

/* Look product detail */
Route::get('product/{id}', 'App\Http\Controllers\User\ShopController@lookProduct');

/* Buy product to cart */
Route::get('add-to-cart/{id}', 'App\Http\Controllers\User\ShopController@buyProduct');
Route::get('product/add-to-cart/{id}', 'App\Http\Controllers\User\ShopController@buyProduct');

/* Remove product from cart */
Route::get('remove-from-cart/{id}', 'App\Http\Controllers\User\CartController@removeFromCart');


/* Finalize purchase */
Route::get('checkout', 'App\Http\Controllers\User\CartController@checkoutAmount')->name('checkout');
Route::post('/finish', 'App\Http\Controllers\User\CartController@Finish');



/* Administrator section */

/* Main show product */
Route::get('admin', 'App\Http\Controllers\Administrator\MainController@showProducts')->middleware(['auth:administrator']);

/* Add product */
Route::get('products/add-product', function() {return view('administrator.add');})->middleware(['auth:administrator'])->name('product.add');
Route::post('/added', 'App\Http\Controllers\Administrator\AddController@addProducts')->middleware(['auth:administrator']);



/* Delete product */
Route::get('products/delete/{id}', 'App\Http\Controllers\Administrator\MainController@deleteProduct')->middleware(['auth:administrator']);

/* Edit product */
Route::get('products/edit/{id}', 'App\Http\Controllers\Administrator\MainController@editProduct')->middleware(['auth:administrator']);
Route::post('products/update', 'App\Http\Controllers\Administrator\MainController@updateProduct')->middleware(['auth:administrator']);





require __DIR__.'/user.php';require __DIR__.'/administrator.php';