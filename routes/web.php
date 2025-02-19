<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;




// Route::resource('/', CategoryController::class);
Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/create', [CategoryController::class, 'store'])->name('categories.store');