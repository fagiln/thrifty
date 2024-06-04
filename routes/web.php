<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Buyer\DashboardBuyerController;
use App\Http\Controllers\Seller\AddSellerController;
use App\Http\Controllers\Seller\DashboardSellerController;
use App\Http\Controllers\Seller\UserListController;
use App\Http\Controllers\Seller\CategoryListController;
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
    if (auth()->check() && auth()->user()->role == 'seller') {
        return redirect('seller/dashboard');
    }
    return view('landing');
});


Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
    Route::resource('/register', RegisterController::class)->names('register');
});

Route::middleware(['auth', 'verified', 'user.role:seller'])->group(function () {
    Route::group(['prefix' => 'seller', 'as' => 'seller.'], function () {
        Route::resource('/dashboard', DashboardSellerController::class)->names('dashboard');
        Route::resource('/add-seller', AddSellerController::class)->names('add.seller');
        // Route::post('/add-seller',[ AddSellerController::class, 'store'])->name('add.seller.index');
        Route::resource('/user-list', UserListController::class)->names('user.list');
        Route::put('/user-list/{id}', [UserListController::class, 'update'])->name('user.list.update');
        Route::resource('/category-list', CategoryListController::class)->names('category.list');
        Route::get('/category-add', [CategoryListController::class, 'showAdd'])->name('category.showadd');
        Route::post('/category-add', [CategoryListController::class, 'store'])->name('category.store');
        // Route::get('/category-list/{id}/edit', [CategoryListController::class, 'edit'])->name('category.edit');
        // Route::delete('/category-list/{id}', [CategoryListController::class, 'destroy'])->name('category.delete');
        Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    });
});
Route::middleware(['auth', 'verified', 'user.role:buyer'])->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});
