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

Route::get('/', [\App\Http\Controllers\HomeController::class,'index'])->name('index');
Route::post('addToCart', [\App\Http\Controllers\CartController::class,'addToCart'])->name('addToCart');
Route::post('removeFromCart', [\App\Http\Controllers\CartController::class,'removeFromCart'])->name('removeFromCart');




Route::get('admin', [\App\Http\Controllers\CableController::class,'create']);
Route::post('admin/cable_create', [\App\Http\Controllers\CableController::class,'store']);
Route::post('admin/group_create', [\App\Http\Controllers\CableGroupController::class,'store']);



Route::post('login', [\App\Http\Controllers\LoginController::class,'login'])->name('login');
Route::post('register', [\App\Http\Controllers\RegisterController::class,'register'])->name('register');
Route::get('logout', [\App\Http\Controllers\LogoutController::class,'perform'])->name('logout');
Route::get('account', [\App\Http\Controllers\AccountController::class,'index'])->name('account');
