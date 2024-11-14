<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('layout');
});


Route::resource('categories', CategoriesController::class);
Route::get('layout', [CategoriesController::class,"index"])->name('layout');

