<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LogoutController;

use App\Http\Controllers\Admin\OrderController as AdminOrder;
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
Route::get('', [HomeController::class,'index'])->name('index');
Route::get('delivery', [HomeController::class,'delivery'])->name('delivery');
Route::get('about_us', [HomeController::class,'about_us'])->name('about_us');

Route::post('cart', [CartController::class,'add'])->name('cart.add');
Route::put('cart', [CartController::class,'update'])->name('cart.update');
Route::delete('cart', [CartController::class,'remove'])->name('cart.remove');

Route::post('order', [OrderController::class,'create'])->name('order.create');
Route::delete('order', [OrderController::class,'cancel'])->name('order.cancel');
Route::get('order/invoice/{order_id}', [InvoiceController::class,'show'])->name('order.invoice.show');

Route::get('account', [AccountController::class,'show'])->name('account.show');
Route::post('account', [AccountController::class,'save'])->name('account.save');
Route::put('account', [AccountController::class,'recover'])->name('account.recover');
Route::delete('account', [AccountController::class,'delete'])->name('account.delete');


Route::post('register', [RegisterController::class,'register'])->name('register');
Route::post('login', [LoginController::class,'login'])->name('login');
Route::get('logout', [LogoutController::class,'perform'])->name('logout');






Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    Route::get('orders',  [AdminOrder::class,'index' ])->name('orders');
    Route::get('orders/status={status}',  [AdminOrder::class,'index'])->name('orders.filter');
    Route::post('order',  [AdminOrder::class,'update'])->name('order.update');



    Route::get('cables',  [\App\Http\Controllers\Admin\CableController::class,'index'])->name('cables');
    Route::post('cables_save',  [\App\Http\Controllers\Admin\CableController::class,'store'])->name('cables_save');

    Route::post('createGroup',  [\App\Http\Controllers\Admin\CableGroupController::class,'createGroup'])->name('createGroup');
    Route::post('updateGroup',  [\App\Http\Controllers\Admin\CableGroupController::class,'updateGroup'])->name('updateGroup');
    Route::post('deleteImage',  [\App\Http\Controllers\Admin\CableGroupController::class,'deleteImage'])->name('deleteImage');

    Route::get('exchange',  [\App\Http\Controllers\Admin\ExchangeController::class,'index'])->name('exchange');

});
