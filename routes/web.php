<?php
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginAuthController;

Route::get('/', function () {return view('products.layout');});

Route::resource('products', ProductController::class);
Route::get('login', [LoginAuthController::class, 'index'])->name('login');
Route::post('custom-login', [LoginAuthController::class, 'customLogin'])->name('login.custom');
Route::get('register', [LoginAuthController::class, 'registration'])->name('register');
Route::post('custom-registration', [LoginAuthController::class, 'customRegistration'])->name('registration.custom');
Route::get('signOut', [LoginAuthController::class, 'signOut'])->name('signOut');