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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/customer/Registration', function () {return view('customer.registration');})->name('customerRegistration');
Route::post('/customer/Registration',[AuthController::class, 'customerCreateSubmit'])->name('customerRegistration');
Route::get('/customer/Otp', function () {return view('customer.otp');})->name('customerOtp');
Route::post('/customer/Otp',[AuthController::class, 'otpsend'])->name('customerOtp');
Route::get('/otpresend',[AuthController::class, 'otpresend'])->name('otpresend');
Route::get('/customer/Login', function () {return view('customer.login');})->name('customerLogin');
Route::post('/customer/Login',[AuthController::class, 'CustomerLoginSubmit'])->name('customerLogin');
Route::get('/dashboard', function () {return view('welcome');})->name('dashboard');
Route::get('/customer/Logout',[AuthController::class, 'customerlogout'])->name('customerLogout');
Route::get('/redirect',[AuthController::class, 'redirect'])->name('redirect');
Route::get('/callback',[AuthController::class, 'callback'])->name('callback');
Route::get('/customer/Forget_Password', function () {return view('customer.forgetpassword');})->name('forgetPassword');
Route::post('/customer/Forget_Password', [AuthController::class, 'forgetPasswordSubmit'])->name('forgetPassword');
Route::get('/customer/Reset_Password/{email}', [AuthController::class, 'resetpassword'])->name('resetpassword'); 
Route::post('/customer/Reset_Password', [AuthController::class, 'resetpasswordSubmit'])->name('resetpassword');
// Route::get('/email', function () {return view('email.resetpasswordEmail');})->name('reset');
// Route::get('/email2', function () {return view('email.confirmEmail');})->name('reset2');
