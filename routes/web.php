<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Buyer\DashboardBuyerController;
use App\Http\Controllers\Seller\DashboardSellerController;
use Illuminate\Support\Facades\Route;

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
    return view('landing');
});
Route::get('/home', function () {
    if (auth()->user()->role == 'seller') {
        return redirect('seller/dashboard');
    }elseif(auth()->user()->role == 'buyer'){
        return redirect('/dashboard');
    }
});
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
    Route::resource('/register', RegisterController::class)->names('register');
});

Route::middleware(['auth', 'verified', 'user.role:seller'])->group(function () {
    Route::group(['prefix' => 'seller', 'as' => 'seller.'], function () {
        Route::resource('/dashboard', DashboardSellerController::class)->names('dashboard');
        Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    });
});
Route::middleware(['auth', 'verified', 'user.role:buyer'])->group(function () {
    Route::resource('/dashboard', DashboardBuyerController::class)->names('dashboard');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});
