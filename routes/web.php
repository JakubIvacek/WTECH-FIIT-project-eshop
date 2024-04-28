<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use \App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class, 'home'])->name('home');

Route::resource('/products', ProductController::class);

Route::get('/signup-user',[RegisterController::class,'create']);
Route::post('/signup',[RegisterController::class,'store'])->name('signup');


Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/admin',[AdminController::class, 'index'])->name('admin.products.index');
Route::delete('/admin/delete', [ProductController::class, 'destroy'])->name('admin.delete');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/admin/add', [ProductController::class, 'store'])->name('admin.products.store');
Route::put('/admin/modify', [ProductController::class, 'update'])->name('admin.modify');

Route::get('/cart', [CartController::class, 'index']);
Route::get('products/cart/{id}/{count}/{size}', [CartController::class, 'addToCart'])->name('addProduct.to.cart');
Route::get('/delete/{id}', [CartController::class, 'deleteProduct'])->name('delete.cart.product');
Route::get('/cart/update/{id}/{quantity}', [CartController::class, 'updateQuantity'])->name('quantity.cart.product');
Route::get('/cart/display', [CartController::class, 'loggedInPrint']);
Route::get('/checkout',function (){
    return view('checkout');
});

Route::get('/orders',function (){
    return view('orders');
});


Route::get('/profile',function (){
    return view('profile');
});

Route::get('/profileChange',function (){
    return view('profileChange');
});

Route::get('/shoppingCart',function (){
    return view('shoppingCart');
});
