<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/customerRegistration', function () {return view('customer.registration');})->name('customerRegistration');
Route::post('/customerRegistration',[AuthController::class, 'customerCreateSubmit'])->name('customerRegistration');
Route::get('/customerOtp', function () {return view('customer.otp');})->name('customerOtp');
Route::post('/customerOtp',[AuthController::class, 'otpsend'])->name('customerOtp');
Route::get('/otpresend',[AuthController::class, 'otpresend'])->name('otpresend');
Route::get('/customerLogin', function () {return view('customer.login');})->name('customerLogin');
Route::post('/customerLogin',[AuthController::class, 'CustomerLoginSubmit'])->name('customerLogin');
Route::get('/dashboard', function () {return view('welcome');})->name('dashboard');
Route::get('/customerLogout',[AuthController::class, 'customerlogout'])->name('customerLogout');

