<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

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

// Homepage
Route::get('/', [ProductController::class, 'index']);

// Product details
Route::get('/products/{product:slug}', [ProductController::class, 'details']);

// Products per category
Route::get('/categories/{category:slug}', [CategoryController::class, 'index']);
