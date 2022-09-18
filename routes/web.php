<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;
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
Route::get('', [\App\Http\Controllers\HomeController::class,'index'])->name('index');
Route::post('addToCart', [\App\Http\Controllers\CartController::class,'addToCart'])->name('addToCart');
Route::post('removeFromCart', [\App\Http\Controllers\CartController::class,'removeFromCart'])->name('removeFromCart');
Route::post('updateQuantity', [\App\Http\Controllers\CartController::class,'updateQuantity'])->name('updateQuantity');
Route::post('createOrder', [\App\Http\Controllers\OrderController::class,'createOrder'])->name('createOrder');

Route::get('account', [\App\Http\Controllers\AccountController::class,'index'])->name('account');
Route::get('account/cancelOrder/{order_id}', [\App\Http\Controllers\OrderController::class,'cancelOrder'])->name('cancelOrder');
Route::get('account/formInvoice/{order_id}', [\App\Http\Controllers\InvoiceController::class,'formInvoice'])->name('formInvoice');
Route::get('account/formQr/{order_id}', [\App\Http\Controllers\InvoiceController::class,'formQr'])->name('formQr');
Route::post('account/saveUserData', [\App\Http\Controllers\AccountController::class,'saveUserData'])->name('saveUserData');



Route::post('user_login', [\App\Http\Controllers\LoginController::class,'login'])->name('login');
Route::post('user_register', [\App\Http\Controllers\RegisterController::class,'register'])->name('register');
Route::get('user_logout', [\App\Http\Controllers\LogoutController::class,'perform'])->name('logout');
Route::get('user_deleteAccount', [\App\Http\Controllers\AccountController::class,'deleteAccount'])->name('deleteAccount');



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    Route::get('orders',  [\App\Http\Controllers\Admin\OrderController::class,'index', 'as' => 'orders']);
    Route::post('order',  [\App\Http\Controllers\Admin\OrderController::class,'show', 'as' => 'order']);
    Route::post('update_order',  [\App\Http\Controllers\Admin\OrderController::class,'updateOrder'])->name('updateOrder');
    Route::get('cables',  [\App\Http\Controllers\Admin\CableController::class,'index'])->name('cables');
});
