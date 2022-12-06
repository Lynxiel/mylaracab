<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactUsController;
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
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\SitemapController;

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

Route::controller(HomeController::class)->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('delivery','delivery')->name('delivery');
    Route::get('about_us', 'about_us')->name('about_us');
    Route::get('politics', 'politics')->name('politics');
    Route::get('agreement', 'agreement')->name('agreement');
});

Route::controller(CartController::class)->group(function (){
    Route::post('cart', 'add')->name('cart.add');
    Route::put('cart', 'update')->name('cart.update');
    Route::delete('cart', 'remove')->name('cart.remove');
});

Route::post('contact_us', [ContactUsController::class,'index'])->name('contact_us');

Route::post('order', [OrderController::class,'create'])->name('order.create');
Route::delete('order', [OrderController::class,'cancel'])->name('order.cancel');

Route::middleware('auth')->group(function (){
    Route::controller(AccountController::class)->group(function (){
        Route::get('account', 'show')->name('account.show');
        Route::post('account', 'save')->name('account.save');
        Route::put('account', 'recover')->name('account.recover')->withoutMiddleware('auth');
        Route::delete('account', 'delete')->name('account.delete');
    });

    Route::put('password',[PasswordController::class, 'update'])->name('password.update');
    Route::get('order/invoice/{order_id}', [InvoiceController::class,'show'])->name('order.invoice.show');
    Route::get('logout', [LogoutController::class,'perform'])->name('logout');
});

Route::middleware('guest')->group(function (){
    Route::post('register', [RegisterController::class,'register'])->name('register');
    Route::post('auth', [LoginController::class,'login'])->name('login');
});


Route::prefix('admin')->middleware('auth.admin')->group(function () {
    Route::get('', [AdminController::class, 'index'] )->name('admin.index');
    Route::get('exchange', [ExchangeController::class, 'index'] )->name('admin.exchange');
    Route::resource('orders', AdminOrder::class );
    Route::patch('orders/{order_id}/edit', [AdminOrder::class, 'pivotAttach'] )->name('orders.pivot.attach');
    Route::delete('orders/{order_id}/edit', [AdminOrder::class, 'pivotDetach'] )->name('orders.pivot.detach');
    Route::resource('cables', AdminCable::class )->only(['index', 'edit', 'update']);
    Route::resource('groups', AdminCableGroup::class )->only(['edit','update', 'store', 'destroy']);
    Route::delete('deleteImage/{group_id}', [AdminCableGroup::class, 'deleteImage'] )->name('deleteImage');
});

Route::get('sitemap', [SitemapController::class, 'index']);
