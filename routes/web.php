<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Auth;
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



Route::get('/', [UserController::class,'index']);

Route::get('/view-product/{id}',[UserController::class,'viewProduct']);

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

//user route
Route::get('/allProducts', [UserController::class, 'allProducts']);
Route::get('/contactUs', [UserController::class, 'contactUs']);
Route::get('/viewMoreProducts/{id}', [UserController::class, 'viewMoreProducts']);
Route::get('/profile', [UserController::class, 'profile']);
Route::post('/search-product',[UserController::class,'searchProduct']);
Route::get('/orderHistory', [UserController::class, 'orderHistory']);


//admin route
Route::get('/dashboard', [AdminController::class, 'index']);
Route::get('/categories',[AdminController::class,'categories']);
Route::get('/products',[AdminController::class,'products']);

//Category-Route
Route::get('/categories/{id}',[AdminController::class,'categories']);
Route::post('/add-category',[CategoryController::class,'store']);
Route::post('/update-category/{id}',[CategoryController::class,'update']);
Route::get('/edit-category/{id}',[CategoryController::class,'edit']);
Route::get('/delete-category/{id}',[CategoryController::class,'destroy']);

//Product-Route
Route::get('/products/{id}',[AdminController::class,'products']);
Route::post('/add-product',[ProductController::class,'store']);
Route::post('/update-product/{id}',[ProductController::class,'update']);
Route::get('/edit-product/{id}',[ProductController::class,'edit']);
Route::get('/delete-product/{id}',[ProductController::class,'destroy']);

// add to cart 
Route::post('/add-to-cart/{id}',[CartController::class,'addToCart']);
Route::get('/remove-cart/{id}',[CartController::class,'removeCart']);
// checkout
Route::get('/checkout',[CartController::class,'checkout']);
// order 
Route::post('/order',[OrderController::class,'store']);

Route::get('/orders',[AdminController::class,'orders']);
Route::get('/viewOrderDetails/{id}',[OrderController::class, 'orderDetails']);
