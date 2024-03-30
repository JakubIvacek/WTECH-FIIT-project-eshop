<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;


Route::get('/', function () {
    return view('home');
});


Route::get('/signup-user',[RegisterController::class,'create']);
Route::post('/signup',[RegisterController::class,'store'])->name('signup');


Route::get('/login',function (){
    return view('login');
});

Route::get('/admin',function (){
    return view('admin');
});


Route::get('/checkout',function (){
    return view('checkout');
});

Route::get('/orders',function (){
    return view('orders');
});

Route::get('/products',function (){
    return view('products');
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

