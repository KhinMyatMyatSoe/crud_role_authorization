<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

// Route::get('/home', function () {
//     return view('welcome');
// });


Auth::routes();

 Route::resource('/admin_profile',App\Http\Controllers\AdminController::class);
 Route::resource('/customer_profile',App\Http\Controllers\CustomerController::class);
 Route::get('/home',[App\Http\Controllers\HomeController::class, 'index'])->name('home');
