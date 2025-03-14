<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/products", [ProductController::class, 'index'])->name('index');
Route::get('/products/search', [ProductController::class, 'search']);
Route::get("/products/register", [RegisterController::class, 'register'])->name('products.register');
Route::post('/products/register', [RegisterController::class, 'store']);
Route::get("/products/back", [RegisterController::class, 'back'])->name('back');
Route::get("/products/{productId}", [ProductController::class, 'show'])->name('show');
Route::patch("/products/{productId}/update", [ProductController::class, 'update'])->name('update');
Route::delete("/products/{productId}/delete", [ProductController::class, 'destroy'])->name('destroy');
