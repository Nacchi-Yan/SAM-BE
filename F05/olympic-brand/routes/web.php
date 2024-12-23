<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productsController;
use App\Http\Controllers\usersController;
use App\Http\Controllers\ordersController;
// Route::get('/', function () {
//     return view('welcome');
// });

// authentication
Route::view('login', 'login')->name('login');
Route::view('signup', 'register')->name('signup');
Route::post('signup', [usersController::class, 'register'])->name('signup');
Route::post('login', [usersController::class, 'login'])->name('login');


// frontend
Route::post('Add', [ordersController::class, 'addToCart'])->name('Add');
Route::get('Index', [productsController::class, 'viewProducts'])->name('Index');
Route::get('orders', [ordersController::class, 'viewOrders'])->name('orders');
Route::post('receipts', [ordersController::class, 'viewReceipt'])->name('receipts');

// admin
Route::view('admin', 'admin')->name('admin');
Route::get('admin', [productsController::class, 'view'])->name('admin');
Route::get('/delete/prod/{productID}', [productsController::class, 'delete'])->name('delete.products');
