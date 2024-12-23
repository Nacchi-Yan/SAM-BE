<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productsController;
use App\Http\Controllers\usersController;
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('Index', [productsController::class, 'viewProducts'])->name('Index');
Route::view('login', 'login')->name('login');
Route::view('signup', 'register')->name('signup');
Route::post('signup', [usersController::class, 'register'])->name('signup');

