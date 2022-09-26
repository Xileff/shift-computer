<?php

use App\Http\Controllers\CartItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
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

// User Routes

// Homepage
Route::get('/', [ProductController::class, 'index']);

// Product details
Route::get('/products/{product:slug}', [ProductController::class, 'details']);

// Products per category
Route::get('/categories/{category:slug}', [CategoryController::class, 'index']);

// Login
Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::get('/logout', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

// Register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

// Logged In User Routes
Route::get('/profile', [UserController::class, 'index'])->middleware('auth');
Route::put('/profile', [UserController::class, 'update'])->middleware('auth');
Route::get('/cart', [CartItemController::class, 'index'])->middleware('auth');
Route::resource('/cartItems', CartItemController::class)->middleware('auth');

// Admin Routes
Route::get('/dashboard/products/checkSlug', [DashboardProductController::class, 'checkSlug'])->middleware('admin');
Route::resource('/dashboard/products', DashboardProductController::class)->middleware('admin');
