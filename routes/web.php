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
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ExchangeController;
use App\Http\Controllers\Admin\OrderController as AdminOrder;
use App\Http\Controllers\Admin\CableController as AdminCable;
use App\Http\Controllers\Admin\CableGroupController as AdminCableGroup;
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
Route::get('/', [HomeController::class,'index'])->name('index');
Route::get('delivery', [HomeController::class,'delivery'])->name('delivery');
Route::get('about_us', [HomeController::class,'about_us'])->name('about_us');
Route::get('politics', [HomeController::class,'politics'])->name('politics');
Route::get('agreement', [HomeController::class,'agreement'])->name('agreement');

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


Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('', [AdminController::class, 'index'] )->name('admin.index');
    Route::get('exchange', [ExchangeController::class, 'index'] )->name('admin.exchange');
    Route::resource('orders', AdminOrder::class );
    Route::resource('cables', AdminCable::class )->only(['index', 'edit', 'update']);
    Route::resource('groups', AdminCableGroup::class )->only(['edit','update', 'store', 'destroy']);
    Route::delete('groups/deleteImage/{group_id}', [AdminCableGroup::class, 'deleteImage'] )->name('deleteImage');
});

