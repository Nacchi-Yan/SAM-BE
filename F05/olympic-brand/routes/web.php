<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productsController;
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('Index', [productsController::class, 'viewProducts'])->name('Index');
