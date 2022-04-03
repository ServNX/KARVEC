<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\User\AddressController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Shop\CartController;
use App\Http\Controllers\Shop\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Shop\PageController;

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

Route::view('/portfolio', 'portfolio')->name('portfolio');
Route::view('/contact', 'contact')->name('contact');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/shop/{group}', [PageController::class, 'index'])->name('shop.index');
Route::get('/shop/{group}/{collection}', [PageController::class, 'collection'])->name('shop.collection');
Route::get('/shop/{group}/{collection}/{product}', [PageController::class, 'product'])->name('shop.product');

Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/store', [CartController::class, 'store'])->name('cart.post.store');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.post.update');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.post.remove');
Route::post('/cart/address/update', [CartController::class, 'updateAddress'])->name('cart.post.address.update');
Route::post('/cart/purchase', [CartController::class, 'purchase'])->name('cart.post.purchase');

Route::get('/order/summary', [OrderController::class, 'summary'])->name('order.summary');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.post');
Route::post('/register', [AuthController::class, 'store'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout.post');

Route::get('/user/addresses', [AddressController::class, 'index'])->name('user.addresses');
Route::post('/user/addresses', [AddressController::class, 'store'])->name('user.post.addresses');
